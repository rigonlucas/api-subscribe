<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType\Inputs;

class RestorePaymentTypeInput
{
    public function __construct(public readonly string $id)
    {
    }
}
