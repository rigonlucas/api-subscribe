<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Update\Entities;

class FieldGroupUpdateEntity
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $id,
    ) {}
}
