<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Delete\Entities;

class PaymentTypeDeleteEntity
{
    public function __construct(public readonly string $id)
    {
    }
}
