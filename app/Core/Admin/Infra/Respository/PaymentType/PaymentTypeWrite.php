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
        $paymentTypeModel = PaymentType::create([
            'name' => $paymentTypesEntity->name
        ]);
        if ($paymentTypeModel) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_TYPE->value);
        }
        return $paymentTypeModel->id;
    }

    public function update(PaymentTypesEntity $paymentTypesEntity): string|null
    {
        $paymentTypeModel = PaymentType::find($paymentTypesEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $updatedRegister = $paymentTypeModel->update([
            'name' => $paymentTypesEntity->name
        ]);

        if ($updatedRegister > 0) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_TYPE->value);
        }

        return $paymentTypeModel->id;
    }

    public function delete(PaymentTypesEntity $paymentTypesEntity): string|null
    {
        $paymentTypeModel = PaymentType::find($paymentTypesEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $deletedItem = $paymentTypeModel->delete();
        if ($deletedItem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_TYPE->value);
        }

        return $paymentTypeModel->id;
    }

    public function restore(PaymentTypesEntity $paymentTypesEntity): string|null
    {
        $paymentTypeModel = PaymentType::onlyTrashed()->find($paymentTypesEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $restoreditem = $paymentTypeModel->restore();

        if ($restoreditem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_TYPE->value);
        }

        return $paymentTypeModel->id;
    }
}
