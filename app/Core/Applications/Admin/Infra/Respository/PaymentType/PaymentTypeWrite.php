<?php

namespace App\Core\Applications\Admin\Infra\Respository\PaymentType;

use App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository\PaymentTypeWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Delete\Entities\PaymentTypeDeleteEntity;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Restore\Entities\PaymentTypeRestoreEntity;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Entities\PaymentTypeStoreEntity;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Update\Entities\PaymentTypeUpdateEntity;
use App\Core\Applications\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Support\Cache\CacheManager;
use App\Models\PaymentType;

class PaymentTypeWrite implements PaymentTypeWriteInterface
{
    use CacheManager;

    public function store(PaymentTypeStoreEntity $paymentTypeStoreEntity): string
    {
        $paymentTypeModel = PaymentType::query()->create([
            'name' => $paymentTypeStoreEntity->name
        ]);
        if ($paymentTypeModel) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_TYPE->value);
        }
        return $paymentTypeModel->id;
    }

    public function update(PaymentTypeUpdateEntity $paymentTypeUpdateEntity): ?string
    {
        $paymentTypeModel = PaymentType::query()->find($paymentTypeUpdateEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $updatedRegister = $paymentTypeModel->update([
            'name' => $paymentTypeUpdateEntity->name
        ]);

        if ($updatedRegister > 0) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_TYPE->value);
        }

        return $paymentTypeModel->id;
    }

    public function delete(PaymentTypeDeleteEntity $paymentTypeDeleteEntity): ?string
    {
        $paymentTypeModel = PaymentType::query()->find($paymentTypeDeleteEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $deletedItem = $paymentTypeModel->delete();
        if ($deletedItem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_TYPE->value);
        }

        return $paymentTypeModel->id;
    }

    public function restore(PaymentTypeRestoreEntity $paymentTypeRestoreEntity): ?string
    {
        $paymentTypeModel = PaymentType::onlyTrashed()->find($paymentTypeRestoreEntity->id);
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
