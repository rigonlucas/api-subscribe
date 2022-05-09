<?php

namespace App\Core\Admin\Domain\UseCases\ProcessType\Inputs;

class CreateProcessTypeInput
{
    public function __construct(public readonly string $name)
    {
    }
}
