<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentType\Outputs;

class UpdatePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
