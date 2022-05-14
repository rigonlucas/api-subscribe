<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\Entities;

class PaymentValueDeleteEntity
{
    public function __construct(
        public readonly string $id
    )
    {
    }
}
