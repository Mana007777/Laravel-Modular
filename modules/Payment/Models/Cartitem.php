<?php

namespace Modules\Payment\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartitem extends Model
{
    /** @use HasFactory<\Database\Factories\CartitemFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];


    protected static function newFactory()
    {
        return \Modules\Payment\Database\Factories\CartitemFactory::new();
    }
}
