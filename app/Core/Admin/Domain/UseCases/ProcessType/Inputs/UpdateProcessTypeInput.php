<?php

namespace App\Core\Admin\Domain\UseCases\ProcessType\Inputs;

class UpdateProcessTypeInput
{
    public function __construct(public readonly string $id, public readonly string $name)
    {
    }
}
