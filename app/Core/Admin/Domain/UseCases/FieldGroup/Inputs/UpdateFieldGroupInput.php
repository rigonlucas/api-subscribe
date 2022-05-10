<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup\Inputs;

class UpdateFieldGroupInput
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $description
    ) {}
}
