<?php

namespace App\Core\Admin\Domain\UseCases\PaymentValue\Inputs;

class ListPaymentValueInput
{
    public function __construct(public readonly ?string $searchName)
    {
    }
}
