<?php

namespace App\Core\Admin\Infra\Respository\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Admin\Domain\Entities\Payment\PaymentTypesEntity;
use App\Core\Admin\Domain\Exceptions\PaymentType\PaymentTypeNotFoundException;
use App\Models\PaymentType;

class PaymentTypeWrite implements PaymentTypeWriteInterface
{

    public function store(PaymentTypesEntity $paymentTypesEntity): string
    {
        $paymentTypeModel = PaymentType::create([
            'name' => $paymentTypesEntity->name
        ]);
        return $paymentTypeModel->id;
    }

    public function update(PaymentTypesEntity $paymentTypesEntity): string
    {
        $paymentTypeModel = PaymentType::find($paymentTypesEntity->id);
        if (!$paymentTypeModel) {
            throw new PaymentTypeNotFoundException();
        }
        $paymentTypeModel->update([
            'name' => $paymentTypesEntity->name
        ]);

        return $paymentTypeModel->id;
    }
}
