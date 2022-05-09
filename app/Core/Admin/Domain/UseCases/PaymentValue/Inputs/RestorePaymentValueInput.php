<?php

namespace App\Core\Admin\Domain\UseCases\PaymentValue\Inputs;

class RestorePaymentValueInput
{
    public function __construct(public readonly string $id)
    {
    }
}
