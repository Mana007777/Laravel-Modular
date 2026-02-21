<?php

namespace Modules\Order\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Order\Models\OrderLine;

class OrderLineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
   public function test_it_works()
    {
        $orderLine = OrderLine::factory()->create();
        // dump($orderLine);
        $this->assertInstanceOf(OrderLine::class, $orderLine);
    }
}