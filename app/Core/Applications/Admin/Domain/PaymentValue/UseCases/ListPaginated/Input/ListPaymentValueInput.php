<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\ListPaginated\Input;

class ListPaymentValueInput
{
    public function __construct(public readonly ?string $searchName)
    {
    }
}
