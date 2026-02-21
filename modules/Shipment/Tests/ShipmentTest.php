<?php

namespace Modules\Shipment\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Shipment\Models\Shipment;

class ShipmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
   public function test_it_works()
    {
        $shipment = Shipment::factory()->create();
        
        $this->assertDatabaseHas($shipment);
        }
}