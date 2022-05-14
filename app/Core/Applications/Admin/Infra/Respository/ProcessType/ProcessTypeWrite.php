<?php

namespace App\Core\Applications\Admin\Infra\Respository\ProcessType;

use App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository\ProcessTypeWriteInterface;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete\Entities\ProcessTypeDeleteEntity;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Restore\Entities\ProcessTypeRestoreEntity;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\Entities\ProcessTypeStoreEntity;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Update\Entities\ProcessTypeUpdateEntity;
use App\Core\Applications\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Support\Cache\CacheManager;
use App\Models\ProcessType;

class ProcessTypeWrite implements ProcessTypeWriteInterface
{
    use CacheManager;

    public function store(ProcessTypeStoreEntity $processTypeStoreEntity): string
    {
        $paymentTypeModel = ProcessType::query()->create([
            'name' => $processTypeStoreEntity->name,
            'description' => $processTypeStoreEntity->description,
        ]);
        if ($paymentTypeModel) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PROCESS_TYPE->value);
        }
        return $paymentTypeModel->id;
    }

    public function update(ProcessTypeUpdateEntity $processTypeUpdateEntity): ?string
    {
        $paymentTypeModel = ProcessType::query()->find($processTypeUpdateEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $updatedRegister = $paymentTypeModel->update([
            'name' => $processTypeUpdateEntity->name,
            'description' => $processTypeUpdateEntity->description,
        ]);

        if ($updatedRegister > 0) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PROCESS_TYPE->value);
        }

        return $paymentTypeModel->id;
    }

    public function delete(ProcessTypeDeleteEntity $processTypeDeleteEntity): ?string
    {
        $paymentTypeModel = ProcessType::query()->find($processTypeDeleteEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $deletedItem = $paymentTypeModel->delete();
        if ($deletedItem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PROCESS_TYPE->value);
        }

        return $paymentTypeModel->id;
    }

    public function restore(ProcessTypeRestoreEntity $processTypeRestoreEntity): ?string
    {
        $paymentTypeModel = ProcessType::onlyTrashed()->find($processTypeRestoreEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $restoreditem = $paymentTypeModel->restore();

        if ($restoreditem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PROCESS_TYPE->value);
        }

        return $paymentTypeModel->id;
    }
}
