<?php

namespace App\Policies;

use App\Enums\OrganizationRole;
use App\Models\Organization;
use App\Models\User;
use App\Models\WebhookSubscription;

class WebhookSubscriptionPolicy
{
    public function viewAny(User $user, Organization $organization): bool
    {
        return $user->hasOrganizationRole(
            $organization,
            OrganizationRole::Owner,
            OrganizationRole::Admin,
        );
    }

    public function create(User $user, Organization $organization): bool
    {
        return $user->hasOrganizationRole(
            $organization,
            OrganizationRole::Owner,
            OrganizationRole::Admin,
        );
    }

    public function delete(User $user, WebhookSubscription $subscription): bool
    {
        $org = $subscription->organization;

        return $user->hasOrganizationRole(
            $org,
            OrganizationRole::Owner,
            OrganizationRole::Admin,
        );
    }
}
