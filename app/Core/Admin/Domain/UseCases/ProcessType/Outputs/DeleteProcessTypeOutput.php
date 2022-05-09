<?php

namespace App\Core\Admin\Domain\UseCases\ProcessType\Outputs;

class DeleteProcessTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
