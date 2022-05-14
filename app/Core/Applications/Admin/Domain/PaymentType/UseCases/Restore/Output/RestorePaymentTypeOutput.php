<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Restore\Output;

class RestorePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
