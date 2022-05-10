<?php

namespace App\Core\Applications\Admin\Domain\Entities\Payment;

class PaymentTypeEntity
{
    public function __construct(public readonly string $name, public readonly ?string $id)
    {
    }
}
