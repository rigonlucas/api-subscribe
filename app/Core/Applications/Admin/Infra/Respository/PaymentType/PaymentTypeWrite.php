<?php

namespace App\Core\Applications\Admin\Infra\Respository\PaymentType;

use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Payment\PaymentTypeEntity;
use App\Core\Applications\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Support\Cache\CacheManager;
use App\Models\PaymentType;

class PaymentTypeWrite implements PaymentTypeWriteInterface
{
    use CacheManager;

    public function store(PaymentTypeEntity $paymentTypeEntity): string
    {
        $paymentTypeModel = PaymentType::query()->create([
            'name' => $paymentTypeEntity->name
        ]);
        if ($paymentTypeModel) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_TYPE->value);
        }
        return $paymentTypeModel->id;
    }

    public function update(PaymentTypeEntity $paymentTypeEntity): ?string
    {
        $paymentTypeModel = PaymentType::query()->find($paymentTypeEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $updatedRegister = $paymentTypeModel->update([
            'name' => $paymentTypeEntity->name
        ]);

        if ($updatedRegister > 0) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_TYPE->value);
        }

        return $paymentTypeModel->id;
    }

    public function delete(PaymentTypeEntity $paymentTypeEntity): ?string
    {
        $paymentTypeModel = PaymentType::query()->find($paymentTypeEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $deletedItem = $paymentTypeModel->delete();
        if ($deletedItem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_TYPE->value);
        }

        return $paymentTypeModel->id;
    }

    public function restore(PaymentTypeEntity $paymentTypeEntity): ?string
    {
        $paymentTypeModel = PaymentType::onlyTrashed()->find($paymentTypeEntity->id);
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
