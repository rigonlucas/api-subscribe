<?php

namespace App\Core\Admin\Domain\Contracts\Repository\FieldGroup;

use App\Core\Admin\Domain\Entities\Field\FieldGroupEntity;

interface FieldGroupWriteInterface
{
    public function store (FieldGroupEntity $fieldGroupEntity): string;

    public function update (FieldGroupEntity $fieldGroupEntity): ?string;

    public function delete (FieldGroupEntity $fieldGroupEntity): ?string;

    public function restore (FieldGroupEntity $fieldGroupEntity): ?string;
}
