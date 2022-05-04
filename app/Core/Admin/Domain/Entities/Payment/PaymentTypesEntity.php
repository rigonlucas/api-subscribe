<?php

namespace App\Core\Admin\Domain\Entities\Payment;

class PaymentTypesEntity
{
    public function __construct(public readonly ?string $id, public readonly string $name)
    {
    }
}
