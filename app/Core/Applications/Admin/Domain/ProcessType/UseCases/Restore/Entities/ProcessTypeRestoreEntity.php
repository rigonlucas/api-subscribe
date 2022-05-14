<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Restore\Entities;

class ProcessTypeRestoreEntity
{
    public function __construct(
        public readonly string $id
    )
    {
    }
}
