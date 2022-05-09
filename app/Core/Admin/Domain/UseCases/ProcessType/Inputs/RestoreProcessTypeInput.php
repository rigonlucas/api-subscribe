<?php

namespace App\Core\Admin\Domain\UseCases\ProcessType\Inputs;

class RestoreProcessTypeInput
{
    public function __construct(public readonly string $id)
    {
    }
}
