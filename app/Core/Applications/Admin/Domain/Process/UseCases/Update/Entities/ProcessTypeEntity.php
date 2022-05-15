<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Update\Entities;

class ProcessTypeEntity
{
    public function __construct(public readonly string $id)
    {
    }
}
