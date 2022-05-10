<?php

namespace App\Core\Applications\Admin\Domain\UseCases\ProcessType\Inputs;

class RestoreProcessTypeInput
{
    public function __construct(public readonly string $id)
    {
    }
}
