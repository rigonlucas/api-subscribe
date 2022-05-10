<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentValue\Outputs;

class DeletePaymentValueOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
