<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\Entities;

class PaymentValueStoreEntity
{
    public function __construct(
        public readonly string $name,
        public readonly float $value = 0,
    )
    {
    }
}
