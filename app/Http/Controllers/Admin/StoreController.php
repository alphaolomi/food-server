<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class StoreController extends Controller
{
    public function index(Request $request): Response
    {
        $user = $request->user();

        $stores = Store::query()
            ->whereHas('organization.users', fn ($q) => $q->where('users.id', $user->id))
            ->with('organization')
            ->orderBy('name')
            ->get();

        return Inertia::render('Admin/Stores/Index', [
            'stores' => $stores->map(fn (Store $s) => [
                'id' => $s->id,
                'name' => $s->name,
                'slug' => $s->slug,
                'organization_name' => $s->organization->name,
                'can_manage_catalog' => $user->canManageCatalogForStore($s),
            ]),
        ]);
    }
}
