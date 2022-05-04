<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType\Inputs;

class UpdatePaymentTypeOutput
{
    public function __construct(public readonly string $id,public readonly string $name)
    {
    }
}
