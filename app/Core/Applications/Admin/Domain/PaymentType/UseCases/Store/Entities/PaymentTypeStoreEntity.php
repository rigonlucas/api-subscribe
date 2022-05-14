<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Entities;

class PaymentTypeStoreEntity
{
    public function __construct(public readonly string $name)
    {
    }
}
