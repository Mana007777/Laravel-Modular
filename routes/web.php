<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\checkoutController;

Route::middleware('auth')->group(function () {
    Route::post('/checkout', checkoutController::class)->name('checkout.store');
});
