<?php

namespace App\Core\Applications\Admin\Domain\UseCases\ProcessType\Outputs;

class CreateProcessTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
