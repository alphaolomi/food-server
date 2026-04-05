<?php

namespace App\Http\Controllers\Api\V1;

use App\Domains\Payments\PaymentOrchestrator;
use App\Http\Controllers\Controller;
use App\Http\Responses\ApiError;
use App\Models\Payment;
use Dedoc\Scramble\Attributes\Endpoint;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

#[Group('Payments', weight: 6)]
class RefundController extends Controller
{
    public function __construct(
        private PaymentOrchestrator $payments
    ) {}

    #[Endpoint(operationId: 'refundPayment', title: 'Refund payment (stub)')]
    public function store(Request $request, Payment $payment): JsonResponse
    {
        $order = $payment->order;
        if ($order->user_id !== $request->user()->id) {
            return ApiError::json('Forbidden.', 'forbidden', Response::HTTP_FORBIDDEN);
        }

        $validated = $request->validate([
            'amount_cents' => ['required', 'integer', 'min:1'],
        ]);

        try {
            $result = $this->payments->refund(
                $payment,
                (int) $validated['amount_cents'],
                $payment->provider,
            );
        } catch (\InvalidArgumentException) {
            return ApiError::json('Invalid refund amount.', 'invalid_refund', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json([
            'refund' => [
                'id' => $result['refund']->id,
                'status' => $result['refund']->status,
                'amount_cents' => $result['refund']->amount_cents,
                'external_ref' => $result['refund']->external_ref,
            ],
        ], Response::HTTP_CREATED);
    }
}
