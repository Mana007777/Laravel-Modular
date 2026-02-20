<?php

namespace Modules\Order\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Order\Models\Order;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_works()
    {
        $this->assertTrue(true);
    }
}