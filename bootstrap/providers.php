<?php

use Modules\Order\Providers\OrderServiceProvider;
use Modules\Order\Providers\RouteServiceProvider;
use Modules\Payment\Providers\PaymentServiceProvider;
use Modules\Product\Providers\ProductServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    OrderServiceProvider::class,
    PaymentServiceProvider::class,
    ProductServiceProvider::class
    ];
