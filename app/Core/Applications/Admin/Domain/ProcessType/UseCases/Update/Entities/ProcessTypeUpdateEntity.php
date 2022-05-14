<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Update\Entities;

class ProcessTypeUpdateEntity
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly string $id
    )
    {
    }
}
