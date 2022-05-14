<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\Output;

class CreatePaymentValueOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
