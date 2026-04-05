<?php

use App\Http\Controllers\Api\V1\AuthTokenController;
use App\Http\Controllers\Api\V1\CatalogController;
use App\Http\Controllers\Api\V1\CheckoutController;
use App\Http\Controllers\Api\V1\CurrentUserController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\PaymentCallbackController;
use App\Http\Controllers\Api\V1\RefundController;
use App\Http\Controllers\Api\V1\StoreDirectoryController;
use App\Http\Controllers\Api\V1\WebhookSubscriptionController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (): void {
    Route::post('/auth/register', [AuthTokenController::class, 'register']);
    Route::post('/auth/login', [AuthTokenController::class, 'login']);

    Route::get('/stores', [StoreDirectoryController::class, 'index']);
    Route::get('/stores/{store_slug}/catalog', [CatalogController::class, 'show']);

    Route::post('/payments/callbacks/{provider}', [PaymentCallbackController::class, 'store']);

    Route::middleware('auth:sanctum')->group(function (): void {
        Route::post('/auth/logout', [AuthTokenController::class, 'logout']);
        Route::get('/user', [CurrentUserController::class, 'show']);
        Route::get('/orders/{order}', [OrderController::class, 'show']);
        Route::post('/stores/{store_slug}/checkout', [CheckoutController::class, 'store']);
        Route::post('/payments/{payment}/refunds', [RefundController::class, 'store']);
        Route::get('/organizations/{organization}/webhook-subscriptions', [WebhookSubscriptionController::class, 'index']);
        Route::post('/webhook-subscriptions', [WebhookSubscriptionController::class, 'store']);
        Route::delete('/webhook-subscriptions/{webhook_subscription}', [WebhookSubscriptionController::class, 'destroy']);
    });
});
