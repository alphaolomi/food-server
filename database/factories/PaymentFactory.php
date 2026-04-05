<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'provider' => 'tz_mobile_money_stub',
            'status' => 'pending',
            'amount_cents' => 1000,
            'external_ref' => null,
            'meta' => null,
        ];
    }
}
