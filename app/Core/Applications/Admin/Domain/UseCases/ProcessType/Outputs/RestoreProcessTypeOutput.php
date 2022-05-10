<?php

namespace App\Core\Applications\Admin\Domain\UseCases\ProcessType\Outputs;

class RestoreProcessTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
