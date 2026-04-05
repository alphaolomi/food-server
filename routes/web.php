<?php

use App\Http\Controllers\Admin\CatalogItemController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderBoardController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/orders', OrderBoardController::class)->name('orders');

    Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');
    Route::resource('stores.categories', CategoryController::class)->scoped(['category' => 'store_id']);
    Route::resource('stores.catalog-items', CatalogItemController::class)
        ->scoped(['catalog_item' => 'store_id'])
        ->parameters(['catalog-items' => 'catalog_item']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
