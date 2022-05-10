<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentValue\Outputs;

class UpdatePaymentValueOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
