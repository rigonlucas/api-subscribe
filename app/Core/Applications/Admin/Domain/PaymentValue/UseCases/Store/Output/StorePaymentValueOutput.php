<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\Output;

class StorePaymentValueOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
