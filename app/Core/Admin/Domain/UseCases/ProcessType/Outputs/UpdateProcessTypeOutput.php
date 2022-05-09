<?php

namespace App\Core\Admin\Domain\UseCases\ProcessType\Outputs;

class UpdateProcessTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
