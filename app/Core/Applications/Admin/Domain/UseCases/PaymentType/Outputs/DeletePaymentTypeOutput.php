<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentType\Outputs;

class DeletePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
