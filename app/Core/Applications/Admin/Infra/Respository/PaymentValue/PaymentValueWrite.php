<?php

namespace App\Core\Applications\Admin\Infra\Respository\PaymentValue;

use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Payment\PaymentValueEntity;
use App\Core\Applications\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Support\Cache\CacheManager;
use App\Models\PaymentValue;

class PaymentValueWrite implements PaymentValueWriteInterface
{
    use CacheManager;

    public function store(PaymentValueEntity $paymentValueEntity): string
    {
        $paymentValueModel = PaymentValue::query()->create([
            'name' => $paymentValueEntity->name,
            'value' => $paymentValueEntity->value
        ]);
        if ($paymentValueModel) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_VALUE->value);
        }
        return $paymentValueModel->id;
    }

    public function update(PaymentValueEntity $paymentValueEntity): ?string
    {
        $paymentValueModel = PaymentValue::query()->find($paymentValueEntity->id);
        if (!$paymentValueModel) {
            return null;
        }
        $updatedRegister = $paymentValueModel->update([
            'name' => $paymentValueEntity->name,
            'value' => $paymentValueEntity->value
        ]);

        if ($updatedRegister > 0) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_VALUE->value);
        }

        return $paymentValueModel->id;
    }

    public function delete(PaymentValueEntity $paymentValueEntity): ?string
    {
        $paymentValueModel = PaymentValue::query()->find($paymentValueEntity->id);
        if (!$paymentValueModel) {
            return null;
        }
        $deletedItem = $paymentValueModel->delete();
        if ($deletedItem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PAYMENT_VALUE->value);
        }

        return $paymentValueModel->id;
    }

    public function restore(PaymentValueEntity $paymentValueEntity): ?string
    {
        $paymentValueModel = PaymentValue::onlyTrashed()->find($paymentValueEntity->id);
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
