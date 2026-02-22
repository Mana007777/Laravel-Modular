<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Order\DTO\CheckoutDTO;
use Modules\Order\DTO\ProductItemDTO;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'products' => ['required', 'array', 'min:1'],
            'products.*.product_id' => ['required', 'exists:products,id'],
            'products.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function toDTO ():CheckoutDTO
    {
        return new CheckoutDTO(
            user_id: auth()->id(),
        products: array_map(
            fn ($item) => new ProductItemDTO(
                product_id: $item['product_id'],
                quantity: $item['quantity']
            ),
            $this->products
        )
        );
    }
}