<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Restore\Entities;

class PaymentTypeRestoreEntity
{
    public function __construct(public readonly string $id)
    {
    }
}
