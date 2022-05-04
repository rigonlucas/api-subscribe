<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType\Inputs;

class CreatePaymentTypeInput
{
    public function __construct(public readonly string $name)
    {
    }
}
