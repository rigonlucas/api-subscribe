<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\ListPaginated\Input;

class ListPaymentTypeInput
{
    public function __construct(public readonly ?string $searchName)
    {
    }
}
