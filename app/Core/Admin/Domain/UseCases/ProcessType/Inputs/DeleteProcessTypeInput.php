<?php

namespace App\Core\Admin\Domain\UseCases\ProcessType\Inputs;

class DeleteProcessTypeInput
{
    public function __construct(public readonly string $id)
    {
    }
}
