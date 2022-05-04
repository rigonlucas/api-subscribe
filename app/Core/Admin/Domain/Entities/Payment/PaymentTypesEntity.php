<?php

namespace App\Core\Admin\Domain\Entities\Payment;

class PaymentTypesEntity
{
    public function __construct(public readonly ?int $id, public readonly string $name)
    {
    }
}
