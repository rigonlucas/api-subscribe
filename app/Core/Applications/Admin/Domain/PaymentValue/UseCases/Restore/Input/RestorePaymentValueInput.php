<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Restore\Input;

class RestorePaymentValueInput
{
    public function __construct(public readonly string $id)
    {
    }
}
