<?php

namespace Modules\Shipment\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ShipmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
   public function test_it_works()
    {
        $this->assertTrue(true);
    }
}