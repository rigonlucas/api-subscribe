<?php

namespace App\Core\Admin\Infra\Respository\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Admin\Domain\Entities\Payment\PaymentTypesEntity;
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

    public function update(PaymentTypesEntity $paymentTypesEntity): string|null
    {
        $paymentTypeModel = PaymentType::find($paymentTypesEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $paymentTypeModel->update([
            'name' => $paymentTypesEntity->name
        ]);

        return $paymentTypeModel->id;
    }

    public function delete(PaymentTypesEntity $paymentTypesEntity): string|null
    {
        $paymentTypeModel = PaymentType::find($paymentTypesEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $paymentTypeModel->delete();

        return $paymentTypeModel->id;
    }

    public function restore(PaymentTypesEntity $paymentTypesEntity): string|null
    {
        $paymentTypeModel = PaymentType::onlyTrashed()->find($paymentTypesEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $paymentTypeModel->restore();

        return $paymentTypeModel->id;
    }
}
