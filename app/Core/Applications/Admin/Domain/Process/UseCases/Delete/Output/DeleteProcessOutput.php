<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Delete\Output;

class DeleteProcessOutput
{
    public function __construct(public readonly bool $deleted)
    {
    }
}
