<?php

use App\Http\Controllers\Api\V1\AuthTokenController;
use App\Http\Controllers\Api\V1\CatalogController;
use App\Http\Controllers\Api\V1\CheckoutController;
use App\Http\Controllers\Api\V1\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (): void {
    Route::post('/auth/register', [AuthTokenController::class, 'register']);
    Route::post('/auth/login', [AuthTokenController::class, 'login']);

    Route::get('/stores/{store_slug}/catalog', [CatalogController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function (): void {
        Route::post('/auth/logout', [AuthTokenController::class, 'logout']);
        Route::get('/user', fn (Request $request) => $request->user());
        Route::get('/orders/{order}', [OrderController::class, 'show']);
        Route::post('/stores/{store_slug}/checkout', [CheckoutController::class, 'store']);
    });
});
