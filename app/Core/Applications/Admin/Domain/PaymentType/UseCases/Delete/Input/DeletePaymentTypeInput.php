<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Delete\Input;

class DeletePaymentTypeInput
{
    public function __construct(public readonly string $id)
    {
    }
}
