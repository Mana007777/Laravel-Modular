<?php

use Modules\Order\Providers\OrderServiceProvider;
use Modules\Order\Providers\RouteServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    OrderServiceProvider::class,
    RouteServiceProvider::class
];
