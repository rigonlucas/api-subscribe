<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Restore\Entities;

class PaymentValueRestoreEntity
{
    public function __construct(
        public readonly string $id
    )
    {
    }
}
