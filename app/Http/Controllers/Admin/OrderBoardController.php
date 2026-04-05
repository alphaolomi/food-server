<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class OrderBoardController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $user = $request->user();

        $orders = Order::query()
            ->whereHas('store.organization.users', fn ($q) => $q->where('users.id', $user->id))
            ->with(['store', 'lines.catalogItem', 'tickets'])
            ->latest()
            ->limit(100)
            ->get();

        return Inertia::render('Admin/Orders/Index', [
            'orders' => OrderResource::collection($orders)->resolve(),
        ]);
    }
}
