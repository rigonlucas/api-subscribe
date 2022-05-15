<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\Input;

class StorePaymentValueInput
{
    public function __construct(public readonly string $name, public readonly float $value)
    {
    }
}
