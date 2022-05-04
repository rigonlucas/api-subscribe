<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType\Outputs;

class CreatePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
