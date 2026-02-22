<?php

namespace Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Order\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\DB;
use Modules\Order\Actions\CheckoutAction;

class CheckoutController extends Controller
{
    public function __invoke(CheckoutRequest $request , CheckoutAction $action)
    {
        $dto = $request->toDTO();

        $order = DB::transaction(
            fn () => $action->execute($dto)
        );

        return response()->json([
            'order_id' => $order->id,
            'total' => $order->total,
        ], 201);
    }
}
