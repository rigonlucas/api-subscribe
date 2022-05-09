<?php

namespace App\Core\Admin\Domain\Entities\Payment;

class PaymentValueEntity
{
    public function __construct(
        public readonly string $name,
        public readonly float $value = 0,
        public readonly ?string $id = null
    )
    {
    }
}
