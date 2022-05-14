<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Output;

class CreatePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
