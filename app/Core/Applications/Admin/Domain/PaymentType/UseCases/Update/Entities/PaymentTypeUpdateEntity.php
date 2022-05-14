<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Update\Entities;

class PaymentTypeUpdateEntity
{
    public function __construct(public readonly string $name, public readonly string $id)
    {
    }
}
