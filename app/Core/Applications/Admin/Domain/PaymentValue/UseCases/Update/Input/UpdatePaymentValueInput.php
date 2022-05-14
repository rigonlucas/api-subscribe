<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Update\Input;

class UpdatePaymentValueInput
{
    public function __construct(public readonly string $id, public readonly string $name, public readonly float $value)
    {
    }
}
