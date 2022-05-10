<?php

namespace App\Core\Applications\Admin\Domain\UseCases\ProcessType\Inputs;

class DeleteProcessTypeInput
{
    public function __construct(public readonly string $id)
    {
    }
}
