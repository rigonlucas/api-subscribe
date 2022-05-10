<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentType\Outputs;

class CreatePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
