<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\Input;

class DeletePaymentValueInput
{
    public function __construct(public readonly string $id)
    {
    }
}
