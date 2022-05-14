<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Restore\Output;

class RestorePaymentValueOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
