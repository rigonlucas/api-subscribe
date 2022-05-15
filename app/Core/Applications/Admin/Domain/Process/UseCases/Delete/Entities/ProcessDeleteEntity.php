<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Delete\Entities;

class ProcessDeleteEntity
{
    public function __construct(public readonly string $id)
    {
    }
}
