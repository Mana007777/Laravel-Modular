<?php 

namespace Modules\Order\Tests\Http\Controller;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Modules\Product\Database\Factories\ProductFactory;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class checkoutControllerTest extends TestCase{

  #[Test]
  public function it_seccessfully_created_an_order(){

    $user = UserFactory::new()->create();

    $product = ProductFactory::new()->count(2)->create(
        new Sequence(
            [
                "name" => "Product 1",
                "description" => "Description for Product 1",
                "price" => 10.00,
                "stock" => 100,
                "image" => "product1.jpg",
            ],
            [
                "name" => "Product 2",
                "description" => "Description for Product 2",
                "price" => 20.00,
                "stock" => 50,
                "image" => "product2.jpg",
            ]
        )
    );

    $respone = $this->actingAs($user)->post(route("checkout.store"), [
        "products" => [
            [
                "product_id" => $product[0]->id,
                "quantity" => 2,
            ],
            [
                "product_id" => $product[1]->id,
                "quantity" => 1,
            ],
        ],
    ]);
  }
}