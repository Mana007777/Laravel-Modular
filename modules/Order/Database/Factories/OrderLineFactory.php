<?php

namespace Modules\Order\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Order\Models\Order;

class OrderLineFactory extends Factory
{
    protected $model = \Modules\Order\Models\OrderLine::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'product_id' => \Modules\Product\Models\Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 1, 100),
            
        ];
    }
}
