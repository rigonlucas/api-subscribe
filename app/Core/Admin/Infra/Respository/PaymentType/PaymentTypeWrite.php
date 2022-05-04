<?php

namespace App\Core\Admin\Infra\Respository\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Admin\Domain\Entities\Payment\PaymentTypesEntity;
use App\Models\PaymentType;

class PaymentTypeWrite implements PaymentTypeWriteInterface
{

    public function store(PaymentTypesEntity $paymentTypesEntity): string
    {
        $paymentType = PaymentType::create([
            'name' => $paymentTypesEntity->name
        ]);
        return $paymentType->id;
    }

    public function update(PaymentTypesEntity $paymentTypesEntity): string
    {
        // TODO: Implement update() method.
    }
}
