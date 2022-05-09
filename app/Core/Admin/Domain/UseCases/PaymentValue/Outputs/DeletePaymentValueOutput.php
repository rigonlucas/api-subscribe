<?php

namespace App\Core\Admin\Domain\UseCases\PaymentValue\Outputs;

class DeletePaymentValueOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
