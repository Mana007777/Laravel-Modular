<?php

use Modules\Order\Providers\OrderServiceProvider;
use Modules\Order\Providers\RouteServiceProvider;
use Modules\Payment\Providers\PaymentServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    OrderServiceProvider::class,
    PaymentServiceProvider::class
];
