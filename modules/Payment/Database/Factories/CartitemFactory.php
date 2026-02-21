<?php 

namespace Modules\Payment\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Payment\Models\Cartitem;
use Modules\Product\Models\Product;

class CartitemFactory extends Factory 
{
    protected $model = \Modules\Payment\Models\Cartitem::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}