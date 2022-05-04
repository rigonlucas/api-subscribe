<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType\Outputs;

class UpdatePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
