<?php

namespace App\Core\Admin\Domain\UseCases\PaymentValue\Outputs;

class RestorePaymentValueOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
