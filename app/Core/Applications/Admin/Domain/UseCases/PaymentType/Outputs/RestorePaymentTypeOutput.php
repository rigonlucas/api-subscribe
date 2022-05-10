<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentType\Outputs;

class RestorePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
