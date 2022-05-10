<?php

namespace App\Core\Applications\Admin\Domain\UseCases\ProcessType\Inputs;

class CreateProcessTypeInput
{
    public function __construct(public readonly string $name, public readonly string $description)
    {
    }
}
