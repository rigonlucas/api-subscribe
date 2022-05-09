<?php

namespace App\Core\Admin\Domain\UseCases\PaymentValue\Inputs;

class CreatePaymentValueInput
{
    public function __construct(public readonly string $name, public readonly float $value)
    {
    }
}
