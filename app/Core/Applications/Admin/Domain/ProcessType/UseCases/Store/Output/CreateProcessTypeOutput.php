<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\Output;

class CreateProcessTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
