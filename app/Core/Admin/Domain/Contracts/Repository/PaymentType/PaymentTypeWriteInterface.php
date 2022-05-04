<?php

namespace App\Core\Admin\Domain\Contracts\Repository\PaymentType;


use App\Core\Admin\Domain\Entities\Payment\PaymentTypesEntity;

interface PaymentTypeWriteInterface
{
    public function store (PaymentTypesEntity $paymentTypesEntity): string;

    public function update (PaymentTypesEntity $paymentTypesEntity): string;
}
