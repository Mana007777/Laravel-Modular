<?php

namespace Modules\Payment\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Order\Models\Order;
use Modules\Order\Models\OrderLine;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
   public function test_it_works()
    {
        $this->assertTrue(true);
    }
}