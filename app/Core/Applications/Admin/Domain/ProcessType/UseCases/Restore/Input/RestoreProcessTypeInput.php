<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Restore\Input;

class RestoreProcessTypeInput
{
    public function __construct(public readonly string $id)
    {
    }
}
