<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Restore\Input;

class RestoreProcessInput
{
    public function __construct(public readonly string $id)
    {
    }
}
