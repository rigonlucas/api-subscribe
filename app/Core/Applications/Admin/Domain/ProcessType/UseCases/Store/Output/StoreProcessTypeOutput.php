<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\Output;

class StoreProcessTypeOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
