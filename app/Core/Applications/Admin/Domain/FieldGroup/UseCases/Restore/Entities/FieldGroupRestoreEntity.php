<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Restore\Entities;

class FieldGroupRestoreEntity
{
    public function __construct(
        public readonly string $id,
    ) {}
}
