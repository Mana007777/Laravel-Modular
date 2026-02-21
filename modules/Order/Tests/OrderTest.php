<?php

namespace Modules\Order\Tests;

use Database\Factories\OrderFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Order\Models\Order;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_works()
    {
        $user = \App\Models\User::factory()->create();
        $order = Order::factory()->create([
            'user_id' => $user->id
        ]);
        $this->assertInstanceOf(Order::class, $order);
        // dump($order);
    }
}