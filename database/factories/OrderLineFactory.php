<?php

namespace Database\Factories;

use App\Models\CatalogItem;
use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderLine>
 */
class OrderLineFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'catalog_item_id' => CatalogItem::factory(),
            'quantity' => fake()->numberBetween(1, 3),
            'unit_price_cents' => fake()->numberBetween(500, 5000),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (OrderLine $line): void {
            $line->load(['order', 'catalogItem']);
            if ($line->order && $line->catalogItem) {
                $line->catalogItem->update(['store_id' => $line->order->store_id]);
            }
        });
    }
}
