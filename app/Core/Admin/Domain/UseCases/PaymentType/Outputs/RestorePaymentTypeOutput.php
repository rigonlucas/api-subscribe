<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType\Outputs;

class RestorePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
