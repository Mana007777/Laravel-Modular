<?php

namespace Modules\Payment\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Order\Models\Order;
use Modules\Order\Models\OrderLine;
use Modules\Payment\Models\Cartitem;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
   public function test_it_works()
    {
        $cart = Cartitem::factory()->create();
        $this->assertInstanceOf(Cartitem::class, $cart);
    }
}