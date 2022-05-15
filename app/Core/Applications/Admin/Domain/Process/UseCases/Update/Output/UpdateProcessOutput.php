<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Update\Output;

class UpdateProcessOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
