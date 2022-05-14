<?php

namespace App\Core\Applications\Admin\Infra\Respository\PaymentValue;

use App\Core\Applications\Admin\Domain\PaymentValue\Contracts\Repository\PaymentValueWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\Entities\PaymentValueDeleteEntity;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Restore\Entities\PaymentValueRestoreEntity;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\Entities\PaymentValueStoreEntity;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Update\Entities\PaymentValueUpdateEntity;
use App\Core\Applications\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Support\Cache\CacheManager;
use App\Models\PaymentValue;

class PaymentValueWrite implements PaymentValueWriteInterface
{
    use CacheManager;

    public function store(PaymentValueStoreEntity $paymentValueStoreEntity): string
    {
        $paymentValueModel = PaymentValue::query()->create([
            'name' => $paymentValueStoreEntity->name,
            'value' => $paymentValueStoreEntity->value
        ]);
        if ($paymentValueModel) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_VALUE->value);
        }
        return $paymentValueModel->id;
    }

    public function update(PaymentValueUpdateEntity $paymentValueUpdateEntity): ?string
    {
        $paymentValueModel = PaymentValue::query()->find($paymentValueUpdateEntity->id);
        if (!$paymentValueModel) {
            return null;
        }
        $updatedRegister = $paymentValueModel->update([
            'name' => $paymentValueUpdateEntity->name,
            'value' => $paymentValueUpdateEntity->value
        ]);

        if ($updatedRegister > 0) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_VALUE->value);
        }

        return $paymentValueModel->id;
    }

    public function delete(PaymentValueDeleteEntity $paymentValueDeleteEntity): ?string
    {
        $paymentValueModel = PaymentValue::query()->find($paymentValueDeleteEntity->id);
        if (!$paymentValueModel) {
            return null;
        }
        $deletedItem = $paymentValueModel->delete();
        if ($deletedItem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_VALUE->value);
        }

        return $paymentValueModel->id;
    }

    public function restore(PaymentValueRestoreEntity $paymentValueRestoreEntity): ?string
    {
        $paymentValueModel = PaymentValue::onlyTrashed()->find($paymentValueRestoreEntity->id);
        if (!$paymentValueModel) {
            return null;
        }
        $restoreditem = $paymentValueModel->restore();

        if ($restoreditem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_VALUE->value);
        }

        return $paymentValueModel->id;
    }
}
