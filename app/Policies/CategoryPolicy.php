<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\Store;
use App\Models\User;

class CategoryPolicy
{
    public function viewAny(User $user, Store $store): bool
    {
        return $user->canManageCatalogForStore($store);
    }

    public function view(User $user, Category $category): bool
    {
        return $user->canManageCatalogForStore($category->store);
    }

    public function create(User $user, Store $store): bool
    {
        return $user->canManageCatalogForStore($store);
    }

    public function update(User $user, Category $category): bool
    {
        return $user->canManageCatalogForStore($category->store);
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->canManageCatalogForStore($category->store);
    }
}
