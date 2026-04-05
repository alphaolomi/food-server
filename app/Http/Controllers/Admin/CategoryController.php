<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    public function index(Request $request, Store $store): Response
    {
        $this->authorize('viewAny', [Category::class, $store]);

        $categories = $store->categories()->orderBy('position')->orderBy('name')->get();

        return Inertia::render('Admin/Categories/Index', [
            'store' => [
                'id' => $store->id,
                'name' => $store->name,
                'slug' => $store->slug,
            ],
            'categories' => $categories->map(fn (Category $c) => [
                'id' => $c->id,
                'name' => $c->name,
                'position' => $c->position,
            ]),
        ]);
    }

    public function create(Request $request, Store $store): Response
    {
        $this->authorize('create', [Category::class, $store]);

        return Inertia::render('Admin/Categories/Create', [
            'store' => [
                'id' => $store->id,
                'name' => $store->name,
                'slug' => $store->slug,
            ],
        ]);
    }

    public function store(StoreCategoryRequest $request, Store $store): RedirectResponse
    {
        $this->authorize('create', [Category::class, $store]);

        $store->categories()->create([
            'name' => $request->validated('name'),
            'position' => $request->validated('position') ?? 0,
        ]);

        return redirect()->route('admin.stores.categories.index', $store);
    }

    public function edit(Request $request, Store $store, Category $category): Response
    {
        $this->authorize('update', $category);

        return Inertia::render('Admin/Categories/Edit', [
            'store' => [
                'id' => $store->id,
                'name' => $store->name,
                'slug' => $store->slug,
            ],
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'position' => $category->position,
            ],
        ]);
    }

    public function update(UpdateCategoryRequest $request, Store $store, Category $category): RedirectResponse
    {
        $this->authorize('update', $category);

        $category->update([
            'name' => $request->validated('name'),
            'position' => $request->validated('position') ?? 0,
        ]);

        return redirect()->route('admin.stores.categories.index', $store);
    }

    public function destroy(Request $request, Store $store, Category $category): RedirectResponse
    {
        $this->authorize('delete', $category);

        if ($category->catalogItems()->exists()) {
            return back()->withErrors(['category' => 'Move or delete catalog items in this category first.']);
        }

        $category->delete();

        return redirect()->route('admin.stores.categories.index', $store);
    }
}
