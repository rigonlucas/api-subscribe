<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Output;

class StorePaymentTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
