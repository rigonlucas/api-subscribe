<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType\Inputs;

class ListPaymentTypeInput
{
    public function __construct(public readonly string $id)
    {
    }
}
