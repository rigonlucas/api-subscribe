<?php

namespace App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentType;


use App\Core\Applications\Admin\Domain\Entities\Payment\PaymentTypeEntity;

interface PaymentTypeWriteInterface
{
    public function store (PaymentTypeEntity $paymentTypeEntity): string;

    public function update (PaymentTypeEntity $paymentTypeEntity): ?string;

    public function delete (PaymentTypeEntity $paymentTypeEntity): ?string;

    public function restore (PaymentTypeEntity $paymentTypeEntity): ?string;
}
