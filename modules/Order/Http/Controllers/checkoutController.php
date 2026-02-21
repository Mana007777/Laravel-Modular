<?php

namespace Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Order\Http\Requests\CheckoutRequest;
use Modules\Product\Models\Product;
use Modules\Order\Models\Order;
use Modules\Order\Models\OrderLine;
use Modules\Payment\PayBuddy;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __invoke(CheckoutRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $total = 0;
            $lines = [];

            foreach ($request->products as $item) {

                $product = Product::lockForUpdate()->findOrFail($item['product_id']);

                if ($product->stock < $item['quantity']) {
                    abort(422, 'Insufficient stock');
                }

                $product->decrement('stock', $item['quantity']);

                $lineTotal = $product->price * $item['quantity'];
                $total += $lineTotal;

                $lines[] = [
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ];
            }

            // simulate payment
            $payment = PayBuddy::make()->charge(
                'tok_test_123456789012345',
                (int) round($total * 100),
                'Order Payment'
            );

            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
                'payment_id' => $payment['id'],
            ]);

            foreach ($lines as $line) {
                $order->lines()->create($line);
            }

            return response()->json([
                'order_id' => $order->id,
                'total' => $total,
            ], 201);
        });
    }
}