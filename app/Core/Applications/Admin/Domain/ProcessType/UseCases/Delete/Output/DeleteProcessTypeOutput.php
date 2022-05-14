<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete\Output;

class DeleteProcessTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
