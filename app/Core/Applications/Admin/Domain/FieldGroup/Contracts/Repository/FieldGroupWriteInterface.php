<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\Contracts\Repository;

use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\Entities\FieldGroupDeleteEntity;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Restore\Entities\FieldGroupRestoreEntity;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store\Entities\FieldGroupStoreEntity;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Update\Entities\FieldGroupUpdateEntity;

interface FieldGroupWriteInterface
{
    public function store (FieldGroupStoreEntity $fieldGroupStoreEntity): string;

    public function update (FieldGroupUpdateEntity $fieldGroupUpdateEntity): ?string;

    public function delete (FieldGroupDeleteEntity $fieldGroupDeleteEntity): ?string;

    public function restore (FieldGroupRestoreEntity $fieldGroupRestoreEntity): ?string;
}
