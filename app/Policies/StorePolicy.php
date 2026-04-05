<?php

namespace App\Policies;

use App\Models\Store;
use App\Models\User;

class StorePolicy
{
    public function viewCatalogAdmin(User $user, Store $store): bool
    {
        return $user->canManageCatalogForStore($store);
    }

    public function viewOperations(User $user, Store $store): bool
    {
        return $user->canViewStoreOperations($store);
    }
}
