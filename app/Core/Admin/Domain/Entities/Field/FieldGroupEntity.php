<?php

namespace App\Core\Admin\Domain\Entities\Field;

class FieldGroupEntity
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly ?string $id = null,
    ) {}
}
