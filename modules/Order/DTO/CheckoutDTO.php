<?php 

namespace Modules\Order\DTO;

readonly class CheckoutDTO
{
    /**
     * @param ProductItemDTO[] $products
     */
    public function __construct(
        public int $user_id,
        public array $products,
    ) {}
}