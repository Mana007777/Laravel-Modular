<?php
namespace Modules\Order\DTO;

readonly class ProductItemDTO
{
    public function __construct(
        public int $product_id,
        public int $quantity,
    ) {}
}