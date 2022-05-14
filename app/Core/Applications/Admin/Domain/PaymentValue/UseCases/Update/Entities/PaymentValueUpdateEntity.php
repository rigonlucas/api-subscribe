<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Update\Entities;

class PaymentValueUpdateEntity
{
    public function __construct(
        public readonly string $name,
        public readonly float $value,
        public readonly string $id
    )
    {
    }
}
