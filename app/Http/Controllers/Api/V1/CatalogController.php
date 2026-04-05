<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\StoreResource;
use App\Models\Store;
use Dedoc\Scramble\Attributes\Endpoint;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

#[Group('Stores', weight: 1)]
class CatalogController extends Controller
{
    #[Endpoint(operationId: 'storeCatalog', title: 'Store catalog', description: 'Public menu for a store by slug.')]
    public function show(Request $request, string $storeSlug): JsonResponse
    {
        $store = Store::query()->where('slug', $storeSlug)->firstOrFail();

        $categories = $store->categories()
            ->with(['catalogItems' => fn ($q) => $q->where('is_available', true)->orderBy('name')])
            ->orderBy('position')
            ->orderBy('name')
            ->get();

        return response()->json([
            'store' => new StoreResource($store),
            'categories' => CategoryResource::collection($categories),
        ]);
    }
}
