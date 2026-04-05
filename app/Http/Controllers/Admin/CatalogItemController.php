<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCatalogItemRequest;
use App\Http\Requests\Admin\UpdateCatalogItemRequest;
use App\Models\CatalogItem;
use App\Models\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CatalogItemController extends Controller
{
    public function index(Request $request, Store $store): Response
    {
        $this->authorize('viewAny', [CatalogItem::class, $store]);

        $items = $store->catalogItems()
            ->with('category')
            ->orderBy('name')
            ->get();

        return Inertia::render('Admin/CatalogItems/Index', [
            'store' => [
                'id' => $store->id,
                'name' => $store->name,
                'slug' => $store->slug,
            ],
            'items' => $items->map(fn (CatalogItem $i) => [
                'id' => $i->id,
                'name' => $i->name,
                'category_id' => $i->category_id,
                'category_name' => $i->category?->name,
                'price_cents' => $i->price_cents,
                'is_available' => $i->is_available,
            ]),
        ]);
    }

    public function create(Request $request, Store $store): Response|RedirectResponse
    {
        $this->authorize('create', [CatalogItem::class, $store]);

        $categories = $store->categories()->orderBy('position')->orderBy('name')->get();

        if ($categories->isEmpty()) {
            return redirect()
                ->route('admin.stores.categories.index', $store)
                ->with('info', 'Create a category before adding menu items.');
        }

        return Inertia::render('Admin/CatalogItems/Create', [
            'store' => [
                'id' => $store->id,
                'name' => $store->name,
                'slug' => $store->slug,
            ],
            'categories' => $categories->map(fn ($c) => [
                'id' => $c->id,
                'name' => $c->name,
            ]),
        ]);
    }

    public function store(StoreCatalogItemRequest $request, Store $store): RedirectResponse
    {
        $this->authorize('create', [CatalogItem::class, $store]);

        $store->catalogItems()->create([
            'category_id' => $request->validated('category_id'),
            'name' => $request->validated('name'),
            'description' => $request->validated('description'),
            'price_cents' => $request->validated('price_cents'),
            'is_available' => $request->boolean('is_available', true),
        ]);

        return redirect()->route('admin.stores.catalog-items.index', $store);
    }

    public function edit(Request $request, Store $store, CatalogItem $catalogItem): Response
    {
        $this->authorize('update', $catalogItem);

        $categories = $store->categories()->orderBy('position')->orderBy('name')->get();

        return Inertia::render('Admin/CatalogItems/Edit', [
            'store' => [
                'id' => $store->id,
                'name' => $store->name,
                'slug' => $store->slug,
            ],
            'categories' => $categories->map(fn ($c) => [
                'id' => $c->id,
                'name' => $c->name,
            ]),
            'item' => [
                'id' => $catalogItem->id,
                'category_id' => $catalogItem->category_id,
                'name' => $catalogItem->name,
                'description' => $catalogItem->description,
                'price_cents' => $catalogItem->price_cents,
                'is_available' => $catalogItem->is_available,
            ],
        ]);
    }

    public function update(UpdateCatalogItemRequest $request, Store $store, CatalogItem $catalogItem): RedirectResponse
    {
        $this->authorize('update', $catalogItem);

        $catalogItem->update([
            'category_id' => $request->validated('category_id'),
            'name' => $request->validated('name'),
            'description' => $request->validated('description'),
            'price_cents' => $request->validated('price_cents'),
            'is_available' => $request->boolean('is_available'),
        ]);

        return redirect()->route('admin.stores.catalog-items.index', $store);
    }

    public function destroy(Request $request, Store $store, CatalogItem $catalogItem): RedirectResponse
    {
        $this->authorize('delete', $catalogItem);

        $catalogItem->delete();

        return redirect()->route('admin.stores.catalog-items.index', $store);
    }
}
