<?php 

namespace Modules\Shipment\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Order\Models\Order;
use Modules\Shipment\Models\Shipment;

class ShipmentFactory extends Factory
{
    protected $model = Shipment::class;

    public function definition()
    {
        return [
            "order_id"=> Order::factory(),
            "address"=> $this->faker->address(),
            "phone"=> $this->faker->phoneNumber(),
            "city"=> $this->faker->city(),
            "status"=> $this->faker->randomElement(['pending', 'shipped', 'delivered']),
            "shipped_at"=> $this->faker->dateTimeBetween('-1 week', 'now'),
            "delivered_at"=> $this->faker->dateTimeBetween('now', '+1 week'),
        ];
    }
}