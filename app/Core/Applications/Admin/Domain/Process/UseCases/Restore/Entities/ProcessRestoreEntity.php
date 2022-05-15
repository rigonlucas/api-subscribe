<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Restore\Entities;

class ProcessRestoreEntity
{
    public function __construct(public readonly string $id)
    {
    }
}
