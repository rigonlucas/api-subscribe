<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Update\Output;

class UpdateProcessTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
