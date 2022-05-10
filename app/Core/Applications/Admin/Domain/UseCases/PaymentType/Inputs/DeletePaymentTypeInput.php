<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentType\Inputs;

class DeletePaymentTypeInput
{
    public function __construct(public readonly string $id)
    {
    }
}
