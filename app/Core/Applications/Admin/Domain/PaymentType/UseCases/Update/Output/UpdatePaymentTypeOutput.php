<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Update\Output;

class UpdatePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
