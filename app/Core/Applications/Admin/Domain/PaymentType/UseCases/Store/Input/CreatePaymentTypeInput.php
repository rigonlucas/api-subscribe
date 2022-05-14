<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Input;

class CreatePaymentTypeInput
{
    public function __construct(public readonly string $name)
    {
    }
}
