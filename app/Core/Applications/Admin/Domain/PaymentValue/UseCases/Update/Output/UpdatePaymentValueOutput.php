<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Update\Output;

class UpdatePaymentValueOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
