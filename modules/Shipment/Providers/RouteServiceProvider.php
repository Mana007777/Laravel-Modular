<?php

namespace Modules\Shipment\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends BaseRouteServiceProvider
{

/**
     * Bootstrap services.
     *
     * @return void
 */
public function boot(){

   $this->routes(routesCallback: function(){
    Route::middleware('web')
    ->group(__DIR__.'/../routes.php');
   });
}

}