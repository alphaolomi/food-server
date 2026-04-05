<?php

namespace App\Domains\Integrations;

use App\Models\Organization;
use App\Models\WebhookSubscription;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WebhookDispatcher
{
    /**
     * Deliver payload to all active subscriptions for the organization listening to $event.
     * Signature: hex-encoded HMAC-SHA256 of raw body using subscription secret.
     *
     * @param  array<string, mixed>  $payload
     */
    public function dispatch(Organization $organization, string $event, array $payload): void
    {
        $subs = WebhookSubscription::query()
            ->where('organization_id', $organization->id)
            ->where('is_active', true)
            ->get();

        foreach ($subs as $sub) {
            if (! $sub->listensTo($event)) {
                continue;
            }

            $body = json_encode([
                'event' => $event,
                'payload' => $payload,
            ], JSON_THROW_ON_ERROR);

            $secret = $sub->secret;
            $signature = hash_hmac('sha256', $body, $secret);

            try {
                Http::timeout(5)
                    ->withHeaders([
                        'Content-Type' => 'application/json',
                        'X-Mloji-Signature' => $signature,
                        'X-Mloji-Event' => $event,
                    ])
                    ->withBody($body, 'application/json')
                    ->post($sub->url);
            } catch (\Throwable $e) {
                Log::warning('webhook_delivery_failed', [
                    'subscription_id' => $sub->id,
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }
}
