<?php

namespace App\Core\Applications\Admin\Infra\Respository\ProcessType;

use App\Core\Applications\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Process\ProcessTypeEntity;
use App\Core\Applications\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Support\Cache\CacheManager;
use App\Models\ProcessType;

class ProcessTypeWrite implements ProcessTypeWriteInterface
{
    use CacheManager;

    public function store(ProcessTypeEntity $processTypeEntity): string
    {
        $paymentTypeModel = ProcessType::query()->create([
            'name' => $processTypeEntity->name,
            'description' => $processTypeEntity->description,
        ]);
        if ($paymentTypeModel) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PROCESS_TYPE->value);
        }
        return $paymentTypeModel->id;
    }

    public function update(ProcessTypeEntity $processTypeEntity): ?string
    {
        $paymentTypeModel = ProcessType::query()->find($processTypeEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $updatedRegister = $paymentTypeModel->update([
            'name' => $processTypeEntity->name,
            'description' => $processTypeEntity->description,
        ]);

        if ($updatedRegister > 0) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PROCESS_TYPE->value);
        }

        return $paymentTypeModel->id;
    }

    public function delete(ProcessTypeEntity $processTypeEntity): ?string
    {
        $paymentTypeModel = ProcessType::query()->find($processTypeEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $deletedItem = $paymentTypeModel->delete();
        if ($deletedItem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_PROCESS_TYPE->value);
        }

        return $paymentTypeModel->id;
    }

    public function restore(ProcessTypeEntity $processTypeEntity): ?string
    {
        $paymentTypeModel = ProcessType::onlyTrashed()->find($processTypeEntity->id);
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
