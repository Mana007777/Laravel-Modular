<?php

namespace Modules\Shipment\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    /** @use HasFactory<\Database\Factories\ShipmentFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'address',
        'phone',
        'city',
        'status',
        'shipped_at',
        'delivered_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Shipment\Database\Factories\ShipmentFactory::new();
    }
}
