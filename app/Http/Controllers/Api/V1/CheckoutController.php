<?php

namespace App\Http\Controllers\Api\V1;

use App\Domains\Payments\PaymentOrchestrator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\CheckoutRequest;
use App\Http\Resources\OrderResource;
use App\Models\CatalogItem;
use App\Models\Order;
use App\Models\Store;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckoutController extends Controller
{
    public function __construct(
        private PaymentOrchestrator $payments
    ) {}

    public function store(CheckoutRequest $request, string $storeSlug): JsonResponse
    {
        $store = Store::query()->where('slug', $storeSlug)->firstOrFail();
        $user = $request->user();

        $idempotencyKey = $request->header('Idempotency-Key');
        if (is_string($idempotencyKey) && $idempotencyKey !== '') {
            $existing = Order::query()
                ->where('idempotency_key', $idempotencyKey)
                ->where('user_id', $user->id)
                ->first();
            if ($existing) {
                return response()->json([
                    'order' => new OrderResource($existing->load(['lines.catalogItem', 'tickets', 'payments'])),
                    'idempotent_replay' => true,
                ]);
            }
        }

        $linesInput = $request->validated('lines');
        $itemIds = collect($linesInput)->pluck('catalog_item_id')->unique()->values()->all();

        $items = CatalogItem::query()
            ->whereIn('id', $itemIds)
            ->where('store_id', $store->id)
            ->where('is_available', true)
            ->get()
            ->keyBy('id');

        if (count($itemIds) !== $items->count()) {
            return response()->json([
                'message' => 'One or more items are invalid, unavailable, or not sold at this store.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $order = DB::transaction(function () use ($request, $store, $user, $linesInput, $items, $idempotencyKey) {
            $order = Order::query()->create([
                'store_id' => $store->id,
                'user_id' => $user->id,
                'status' => 'pending',
                'total_cents' => 0,
                'fulfillment_type' => $request->validated('fulfillment_type'),
                'idempotency_key' => is_string($idempotencyKey) && $idempotencyKey !== '' ? $idempotencyKey : null,
            ]);

            $total = 0;
            foreach ($linesInput as $line) {
                $item = $items->get($line['catalog_item_id']);
                $qty = (int) $line['quantity'];
                $unit = (int) $item->price_cents;
                $lineTotal = $qty * $unit;
                $total += $lineTotal;

                $order->lines()->create([
                    'catalog_item_id' => $item->id,
                    'quantity' => $qty,
                    'unit_price_cents' => $unit,
                ]);
            }

            $order->update(['total_cents' => $total]);

            $result = $this->payments->initiate($order, $request->validated('payment_provider'));

            if ($result['normalized_status'] === 'succeeded') {
                $order->update(['status' => 'confirmed']);
                Ticket::query()->create([
                    'order_id' => $order->id,
                    'status' => 'queued',
                    'station' => null,
                ]);
            }

            return $order->fresh();
        });

        return response()->json([
            'order' => new OrderResource($order->load(['lines.catalogItem', 'tickets', 'payments'])),
            'idempotent_replay' => false,
        ], Response::HTTP_CREATED);
    }
}
