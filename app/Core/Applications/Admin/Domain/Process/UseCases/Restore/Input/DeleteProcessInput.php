<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Restore\Input;

class DeleteProcessInput
{
    public function __construct(public readonly string $id)
    {
    }
}
