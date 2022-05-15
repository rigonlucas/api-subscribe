<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Store\Entities;

class ProcessTypeEntity
{
    public function __construct(public readonly string $id, public readonly ?string $name = null)
    {
    }
}
