<?php

namespace App\Core\Applications\Admin\Domain\UseCases\ProcessType\Inputs;

class UpdateProcessTypeInput
{
    public function __construct(public readonly string $id, public readonly string $name, public readonly string $description)
    {
    }
}
