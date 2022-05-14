<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\Entities;

class FieldGroupDeleteEntity
{
    public function __construct(
        public readonly string $id,
    ) {}
}
