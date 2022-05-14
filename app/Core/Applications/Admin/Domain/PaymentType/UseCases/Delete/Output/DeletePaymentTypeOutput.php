<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Delete\Output;

class DeletePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
