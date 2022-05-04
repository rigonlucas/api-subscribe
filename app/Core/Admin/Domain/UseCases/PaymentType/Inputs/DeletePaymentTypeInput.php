<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType\Inputs;

class DeletePaymentTypeInput
{
    public function __construct(public readonly string $id)
    {
    }
}
