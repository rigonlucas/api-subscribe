<?php

namespace App\Core\Admin\Infra\Respository\FieldGroup;

use App\Core\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupWriteInterface;
use App\Core\Admin\Domain\Entities\Field\FieldGroupEntity;
use App\Core\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Admin\Infra\Support\Cache\CacheManager;
use App\Models\FieldGroups;

class FieldGroupWrite implements FieldGroupWriteInterface
{
    use CacheManager;

    public function store(FieldGroupEntity $paymentTypeEntity): string
    {
        $paymentTypeModel = FieldGroups::create([
            'name' => $paymentTypeEntity->name
        ]);
        if ($paymentTypeModel) {
            $this->deleteCache(CacheKeysEnum::PREFIX_FIELD_GROUP->value);
        }
        return $paymentTypeModel->id;
    }

    public function update(FieldGroupEntity $paymentTypeEntity): ?string
    {
        $paymentTypeModel = FieldGroups::query()->find($paymentTypeEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $updatedRegister = $paymentTypeModel->update([
            'name' => $paymentTypeEntity->name
        ]);

        if ($updatedRegister > 0) {
            $this->deleteCache(CacheKeysEnum::PREFIX_FIELD_GROUP->value);
        }

        return $paymentTypeModel->id;
    }

    public function delete(FieldGroupEntity $paymentTypeEntity): ?string
    {
        $paymentTypeModel = FieldGroups::query()->find($paymentTypeEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $deletedItem = $paymentTypeModel->delete();
        if ($deletedItem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_FIELD_GROUP->value);
        }

        return $paymentTypeModel->id;
    }

    public function restore(FieldGroupEntity $paymentTypeEntity): ?string
    {
        $paymentTypeModel = FieldGroups::onlyTrashed()->find($paymentTypeEntity->id);
        if (!$paymentTypeModel) {
            return null;
        }
        $restoreditem = $paymentTypeModel->restore();

        if ($restoreditem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_FIELD_GROUP->value);
        }

        return $paymentTypeModel->id;
    }
}
