<?php

namespace App\Core\Admin\Infra\Respository\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Admin\Domain\Entities\Payment\PaymentTypesEntity;
use App\Core\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Admin\Infra\Support\Cache\CacheManager;
use App\Models\PaymentType;

class PaymentTypeWrite implements PaymentTypeWriteInterface
{
    use CacheManager;

    public function store(PaymentTypesEntity $paymentTypesEntity): string
    {
        $this->deleteCache(CacheKeysEnum::PAYMENT_TYPE->value);
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
