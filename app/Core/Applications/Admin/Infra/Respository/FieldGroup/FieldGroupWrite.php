<?php

namespace App\Core\Applications\Admin\Infra\Respository\FieldGroup;

use App\Core\Applications\Admin\Domain\FieldGroup\Contracts\Repository\FieldGroupWriteInterface;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\Entities\FieldGroupDeleteEntity;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Restore\Entities\FieldGroupRestoreEntity;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store\Entities\FieldGroupStoreEntity;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Update\Entities\FieldGroupUpdateEntity;
use App\Core\Applications\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Support\Cache\CacheManager;
use App\Models\FieldGroups;

class FieldGroupWrite implements FieldGroupWriteInterface
{
    use CacheManager;

    public function store(FieldGroupStoreEntity $fieldGroupStoreEntity): string
    {
        $fieldGroupModel = FieldGroups::query()->create([
            'title' => $fieldGroupStoreEntity->title,
            'description' => $fieldGroupStoreEntity->description,
        ]);
        if ($fieldGroupModel) {
            $this->deleteCache(CacheKeysEnum::PREFIX_FIELD_GROUP->value);
        }
        return $fieldGroupModel->id;
    }

    public function update(FieldGroupUpdateEntity $fieldGroupUpdateEntity): ?string
    {
        $fieldGroupModel = FieldGroups::query()->find($fieldGroupUpdateEntity->id);
        if (!$fieldGroupModel) {
            return null;
        }
        $updatedRegister = $fieldGroupModel->update([
            'title' => $fieldGroupUpdateEntity->title,
            'description' => $fieldGroupUpdateEntity->description,
        ]);

        if ($updatedRegister > 0) {
            $this->deleteCache(CacheKeysEnum::PREFIX_FIELD_GROUP->value);
        }

        return $fieldGroupModel->id;
    }

    public function delete(FieldGroupDeleteEntity $fieldGroupDeleteEntity): ?string
    {
        $fieldGroupModel = FieldGroups::query()->find($fieldGroupDeleteEntity->id);
        if (!$fieldGroupModel) {
            return null;
        }
        $deletedItem = $fieldGroupModel->delete();
        if ($deletedItem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_FIELD_GROUP->value);
        }

        return $fieldGroupModel->id;
    }

    public function restore(FieldGroupRestoreEntity $fieldGroupRestoreEntity): ?string
    {
        $fieldGroupModel = FieldGroups::onlyTrashed()->find($fieldGroupRestoreEntity->id);
        if (!$fieldGroupModel) {
            return null;
        }
        $restoreditem = $fieldGroupModel->restore();

        if ($restoreditem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_FIELD_GROUP->value);
        }

        return $fieldGroupModel->id;
    }
}
