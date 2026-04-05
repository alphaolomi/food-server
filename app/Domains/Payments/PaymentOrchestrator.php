<?php

namespace App\Domains\Payments;

use App\Models\Order;
use App\Models\Payment;

class PaymentOrchestrator
{
    public const PROVIDER_TZ_MOBILE_MONEY_STUB = 'tz_mobile_money_stub';

    /**
     * @return array{payment: Payment, normalized_status: string}
     */
    public function initiate(Order $order, string $provider): array
    {
        $amount = $order->total_cents;

        return match ($provider) {
            self::PROVIDER_TZ_MOBILE_MONEY_STUB => $this->stubTanzaniaSuccess($order, $amount),
            default => throw new \InvalidArgumentException("Unsupported payment provider: {$provider}"),
        };
    }

    /**
     * @return array{payment: Payment, normalized_status: string}
     */
    private function stubTanzaniaSuccess(Order $order, int $amountCents): array
    {
        $payment = Payment::query()->create([
            'order_id' => $order->id,
            'provider' => self::PROVIDER_TZ_MOBILE_MONEY_STUB,
            'status' => 'succeeded',
            'amount_cents' => $amountCents,
            'external_ref' => 'stub_'.bin2hex(random_bytes(8)),
            'meta' => ['note' => 'Development stub for Tanzania mobile-money flow'],
        ]);

        return ['payment' => $payment, 'normalized_status' => 'succeeded'];
    }
}
