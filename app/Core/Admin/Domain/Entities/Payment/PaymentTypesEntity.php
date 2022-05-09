<?php

namespace App\Core\Admin\Domain\Entities\Payment;

class PaymentTypesEntity
{
    public function __construct(public readonly string $name, public readonly ?string $id)
    {
    }
}
