<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Responses\ApiError;
use App\Models\Order;
use Dedoc\Scramble\Attributes\Endpoint;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

#[Group('Orders', 'Order details.', weight: 3)]
class OrderController extends Controller
{
    #[Endpoint(operationId: 'showOrder', title: 'Get order')]
    public function show(Request $request, Order $order): JsonResponse
    {
        if ($order->user_id !== $request->user()->id) {
            return ApiError::json('Forbidden.', 'forbidden', Response::HTTP_FORBIDDEN);
        }

        return response()->json([
            'order' => new OrderResource($order->load(['lines.catalogItem', 'tickets', 'payments'])),
        ]);
    }
}
