<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function lines()
    {
        return $this->hasMany(OrderLine::class);
    }
    protected static function newFactory()
    {
        return \Modules\Order\Database\Factories\OrderFactory::new();
    }
}
