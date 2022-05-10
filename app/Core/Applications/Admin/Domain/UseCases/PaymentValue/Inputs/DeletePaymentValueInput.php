<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentValue\Inputs;

class DeletePaymentValueInput
{
    public function __construct(public readonly string $id)
    {
    }
}
