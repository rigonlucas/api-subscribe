<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\Output;

class DeletePaymentValueOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
