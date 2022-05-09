<?php

namespace App\Core\Admin\Domain\UseCases\PaymentValue\Inputs;

class UpdatePaymentValueInput
{
    public function __construct(public readonly string $id, public readonly string $name, public readonly float $value)
    {
    }
}
