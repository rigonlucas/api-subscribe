<?php

namespace App\Core\Admin\Domain\UseCases\PaymentValue\Outputs;

class UpdatePaymentValueOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
