<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Update\Input;

class UpdatePaymentTypeInput
{
    public function __construct(public readonly string $id, public readonly string $name)
    {
    }
}
