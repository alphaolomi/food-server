<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreWebhookSubscriptionRequest;
use App\Models\Organization;
use App\Models\WebhookSubscription;
use Dedoc\Scramble\Attributes\Endpoint;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

#[Group('Integrations', 'Webhooks for partner systems.', weight: 5)]
class WebhookSubscriptionController extends Controller
{
    #[Endpoint(operationId: 'listWebhookSubscriptions', title: 'List webhook subscriptions')]
    public function index(Request $request, Organization $organization): JsonResponse
    {
        $this->authorize('viewAny', [WebhookSubscription::class, $organization]);

        $items = WebhookSubscription::query()
            ->where('organization_id', $organization->id)
            ->orderBy('id')
            ->get(['id', 'url', 'events', 'is_active', 'created_at']);

        return response()->json(['data' => $items]);
    }

    #[Endpoint(operationId: 'createWebhookSubscription', title: 'Create webhook subscription', description: 'Returns the signing secret once; store it securely.')]
    public function store(StoreWebhookSubscriptionRequest $request): JsonResponse
    {
        $organization = Organization::query()->findOrFail($request->validated('organization_id'));

        $this->authorize('create', [WebhookSubscription::class, $organization]);

        $plainSecret = Str::random(48);

        $sub = WebhookSubscription::query()->create([
            'organization_id' => $organization->id,
            'url' => $request->validated('url'),
            'secret' => $plainSecret,
            'events' => $request->validated('events'),
            'is_active' => true,
        ]);

        return response()->json([
            'id' => $sub->id,
            'url' => $sub->url,
            'events' => $sub->events,
            'secret' => $plainSecret,
            'message' => 'Store this secret to verify X-Mloji-Signature (HMAC-SHA256 of raw JSON body).',
        ], Response::HTTP_CREATED);
    }

    #[Endpoint(operationId: 'deleteWebhookSubscription', title: 'Delete webhook subscription')]
    public function destroy(Request $request, WebhookSubscription $webhookSubscription): JsonResponse
    {
        $this->authorize('delete', $webhookSubscription);

        $webhookSubscription->delete();

        return response()->json(['message' => 'Deleted.']);
    }
}
