<?php

namespace App\Domains\Payments;

use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentAttempt;
use App\Models\Refund;

class PaymentOrchestrator
{
    public const PROVIDER_TZ_MOBILE_MONEY_STUB = 'tz_mobile_money_stub';

    /**
     * @return array{payment: Payment, attempt: PaymentAttempt, normalized_status: string}
     */
    public function initiate(Order $order, string $provider): array
    {
        $attempt = PaymentAttempt::query()->create([
            'order_id' => $order->id,
            'provider' => $provider,
            'status' => 'processing',
            'amount_cents' => $order->total_cents,
            'meta' => [],
        ]);

        return match ($provider) {
            self::PROVIDER_TZ_MOBILE_MONEY_STUB => $this->stubTanzaniaSuccess($order, $attempt),
            default => throw new \InvalidArgumentException("Unsupported payment provider: {$provider}"),
        };
    }

    /**
     * Async provider callback (stub): mark attempt + order from provider reference.
     */
    public function handleCallback(string $provider, string $externalRef, string $status): ?PaymentAttempt
    {
        $attempt = PaymentAttempt::query()
            ->where('provider', $provider)
            ->where('external_ref', $externalRef)
            ->first();

        if (! $attempt) {
            return null;
        }

        if ($status === 'succeeded' && $attempt->payment_id === null) {
            $payment = Payment::query()->create([
                'order_id' => $attempt->order_id,
                'provider' => $provider,
                'status' => 'succeeded',
                'amount_cents' => $attempt->amount_cents,
                'external_ref' => $externalRef,
                'meta' => ['via' => 'callback'],
            ]);
            $attempt->update([
                'status' => 'succeeded',
                'payment_id' => $payment->id,
            ]);
        } else {
            $attempt->update(['status' => $status === 'failed' ? 'failed' : $attempt->status]);
        }

        return $attempt->fresh();
    }

    /**
     * @return array{refund: Refund, normalized_status: string}
     */
    public function refund(Payment $payment, int $amountCents, string $provider): array
    {
        if ($amountCents <= 0 || $amountCents > $payment->amount_cents) {
            throw new \InvalidArgumentException('Invalid refund amount.');
        }

        $refund = Refund::query()->create([
            'payment_id' => $payment->id,
            'status' => 'succeeded',
            'amount_cents' => $amountCents,
            'provider' => $provider,
            'external_ref' => 'refund_stub_'.bin2hex(random_bytes(6)),
            'meta' => ['note' => 'Development stub refund'],
        ]);

        return ['refund' => $refund, 'normalized_status' => 'succeeded'];
    }

    /**
     * @return array{payment: Payment, attempt: PaymentAttempt, normalized_status: string}
     */
    private function stubTanzaniaSuccess(Order $order, PaymentAttempt $attempt): array
    {
        $externalRef = 'stub_'.bin2hex(random_bytes(8));

        $payment = Payment::query()->create([
            'order_id' => $order->id,
            'provider' => self::PROVIDER_TZ_MOBILE_MONEY_STUB,
            'status' => 'succeeded',
            'amount_cents' => $order->total_cents,
            'external_ref' => $externalRef,
            'meta' => ['note' => 'Development stub for Tanzania mobile-money flow'],
        ]);

        $attempt->update([
            'status' => 'succeeded',
            'external_ref' => $externalRef,
            'payment_id' => $payment->id,
            'meta' => ['note' => 'Stub completed synchronously'],
        ]);

        return [
            'payment' => $payment,
            'attempt' => $attempt->fresh(),
            'normalized_status' => 'succeeded',
        ];
    }
}
