<?php

namespace Modules\Order\Tests\Http\Controller;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Modules\Product\Database\Factories\ProductFactory;
use Modules\Order\Models\Order;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckoutControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_successfully_creates_an_order()
    {
        $user = UserFactory::new()->create();

        $products = ProductFactory::new()
            ->count(2)
            ->create(new Sequence(
                [
                    "name" => "Product 1",
                    "description" => "Description 1",
                    "price" => 10.00,
                    "stock" => 100,
                    "image" => "p1.jpg",
                ],
                [
                    "name" => "Product 2",
                    "description" => "Description 2",
                    "price" => 20.00,
                    "stock" => 50,
                    "image" => "p2.jpg",
                ],
            ));

        $response = $this->actingAs($user)->post(route('checkout.store'), [
            "products" => [
                ["product_id" => $products[0]->id, "quantity" => 2],
                ["product_id" => $products[1]->id, "quantity" => 1],
            ],
        ]);

        $response->assertCreated();

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'total' => 40, // 10*2 + 20*1
        ]);

        $this->assertEquals(1, Order::count());
    }
}
