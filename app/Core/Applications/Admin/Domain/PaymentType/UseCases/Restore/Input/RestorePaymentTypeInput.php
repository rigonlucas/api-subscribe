<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Restore\Input;

class RestorePaymentTypeInput
{
    public function __construct(public readonly string $id)
    {
    }
}
