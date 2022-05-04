<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType\Outputs;

class DeletePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
