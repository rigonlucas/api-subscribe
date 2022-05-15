<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Restore\Output;

class RestoreProcessOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
