<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete\Entities;

class ProcessTypeDeleteEntity
{
    public function __construct(
        public readonly string $id
    )
    {
    }
}
