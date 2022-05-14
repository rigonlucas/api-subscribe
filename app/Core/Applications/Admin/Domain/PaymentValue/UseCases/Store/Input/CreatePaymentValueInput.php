<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\Input;

class CreatePaymentValueInput
{
    public function __construct(public readonly string $name, public readonly float $value)
    {
    }
}
