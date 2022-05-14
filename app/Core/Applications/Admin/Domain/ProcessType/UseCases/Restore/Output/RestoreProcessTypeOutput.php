<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Restore\Output;

class RestoreProcessTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
