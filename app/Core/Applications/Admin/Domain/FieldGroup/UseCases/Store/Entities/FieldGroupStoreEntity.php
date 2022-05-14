<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store\Entities;

class FieldGroupStoreEntity
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
    ) {}
}
