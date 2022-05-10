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

    public function store(FieldGroupEntity $fieldGroupEntity): string
    {
        $fieldGroupModel = FieldGroups::query()->create([
            'title' => $fieldGroupEntity->title,
            'description' => $fieldGroupEntity->description,
        ]);
        if ($fieldGroupModel) {
            $this->deleteCache(CacheKeysEnum::PREFIX_FIELD_GROUP->value);
        }
        return $fieldGroupModel->id;
    }

    public function update(FieldGroupEntity $fieldGroupEntity): ?string
    {
        $fieldGroupModel = FieldGroups::query()->find($fieldGroupEntity->id);
        if (!$fieldGroupModel) {
            return null;
        }
        $updatedRegister = $fieldGroupModel->update([
            'title' => $fieldGroupEntity->title,
            'description' => $fieldGroupEntity->description,
        ]);

        if ($updatedRegister > 0) {
            $this->deleteCache(CacheKeysEnum::PREFIX_FIELD_GROUP->value);
        }

        return $fieldGroupModel->id;
    }

    public function delete(FieldGroupEntity $fieldGroupEntity): ?string
    {
        $fieldGroupModel = FieldGroups::query()->find($fieldGroupEntity->id);
        if (!$fieldGroupModel) {
            return null;
        }
        $deletedItem = $fieldGroupModel->delete();
        if ($deletedItem) {
            $this->deleteCache(CacheKeysEnum::PREFIX_FIELD_GROUP->value);
        }

        return $fieldGroupModel->id;
    }

    public function restore(FieldGroupEntity $fieldGroupEntity): ?string
    {
        $fieldGroupModel = FieldGroups::onlyTrashed()->find($fieldGroupEntity->id);
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
