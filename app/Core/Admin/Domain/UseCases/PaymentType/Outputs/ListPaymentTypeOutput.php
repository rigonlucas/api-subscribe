<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType\Outputs;

class ListPaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
