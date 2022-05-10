<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentType\Inputs;

class ListPaymentTypeInput
{
    public function __construct(public readonly ?string $searchName)
    {
    }
}
