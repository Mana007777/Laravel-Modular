<?php

namespace Modules\Order\Actions;

use Modules\Order\DTO\CheckoutDTO;
use Modules\Order\Models\Order;
use Modules\Payment\PayBuddy;
use Modules\Product\Models\Product;

class CheckoutAction
{
    public function execute(CheckoutDTO $dto): Order
    {
        $total = 0;
        $lines = [];

        foreach ($dto->products as $item) {
            $product =  Product::lockForUpdate()->find($item->product_id);

            if ($product->stock < $item->quantity) {
                abort(422, "Insufficient stock for product {$product->name}");
            }

            $product->decrement('stock', $item->quantity);

            $lineTotal = $product->price * $item->quantity;

            $total += $lineTotal;

            $lines[] = [
                'product_id' => $product->id,
                'quantity'   => $item->quantity,
                'price'      => $product->price,
            ];
        }

        $payment = PayBuddy::make()->charge(
            'tok_test_123456789012345',
            (int) round($total * 100),
            'Order Payment'
        );

        $order = Order::create([
            'user_id' => $dto->user_id,
            'total' => $total,
            'payment_id' => $payment['id'],
        ]);
        foreach ($lines as $line) {
            $order->lines()->create($line);
        }

        return $order;
    }
}
