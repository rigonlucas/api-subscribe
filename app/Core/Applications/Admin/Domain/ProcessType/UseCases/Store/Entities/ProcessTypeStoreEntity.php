<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\Entities;

class ProcessTypeStoreEntity
{
    public function __construct(
        public readonly string $name,
        public readonly string $description
    )
    {
    }
}
