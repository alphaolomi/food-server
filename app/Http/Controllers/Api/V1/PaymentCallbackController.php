<?php

namespace App\Http\Controllers\Api\V1;

use App\Domains\Payments\PaymentOrchestrator;
use App\Http\Controllers\Controller;
use App\Http\Responses\ApiError;
use Dedoc\Scramble\Attributes\Endpoint;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

#[Group('Payments', 'Provider callbacks (async flows).', weight: 6)]
class PaymentCallbackController extends Controller
{
    public function __construct(
        private PaymentOrchestrator $payments
    ) {}

    #[Endpoint(operationId: 'paymentProviderCallback', title: 'Payment provider callback (stub)')]
    public function store(Request $request, string $provider): JsonResponse
    {
        $validated = $request->validate([
            'reference' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', Rule::in(['succeeded', 'failed'])],
        ]);

        $attempt = $this->payments->handleCallback(
            $provider,
            $validated['reference'],
            $validated['status'],
        );

        if (! $attempt) {
            return ApiError::json('Unknown payment reference.', 'unknown_reference', Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'attempt_id' => $attempt->id,
            'status' => $attempt->status,
            'payment_id' => $attempt->payment_id,
        ]);
    }
}
