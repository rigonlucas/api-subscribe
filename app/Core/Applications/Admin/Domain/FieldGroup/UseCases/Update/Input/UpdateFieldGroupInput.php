<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Update\Input;

class UpdateFieldGroupInput
{
    public function __construct(
        public readonly string $id,
        public readonly string $title,
        public readonly string $description
    ) {}
}
