<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Store\Output;

class StoreProcessOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
