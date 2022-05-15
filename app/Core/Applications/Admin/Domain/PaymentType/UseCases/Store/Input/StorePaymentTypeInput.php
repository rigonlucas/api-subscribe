<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Input;

class StorePaymentTypeInput
{
    public function __construct(public readonly string $name)
    {
    }
}
