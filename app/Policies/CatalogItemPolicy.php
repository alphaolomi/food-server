<?php

namespace App\Policies;

use App\Models\CatalogItem;
use App\Models\Store;
use App\Models\User;

class CatalogItemPolicy
{
    public function viewAny(User $user, Store $store): bool
    {
        return $user->canManageCatalogForStore($store);
    }

    public function view(User $user, CatalogItem $catalogItem): bool
    {
        return $user->canManageCatalogForStore($catalogItem->store);
    }

    public function create(User $user, Store $store): bool
    {
        return $user->canManageCatalogForStore($store);
    }

    public function update(User $user, CatalogItem $catalogItem): bool
    {
        return $user->canManageCatalogForStore($catalogItem->store);
    }

    public function delete(User $user, CatalogItem $catalogItem): bool
    {
        return $user->canManageCatalogForStore($catalogItem->store);
    }
}
