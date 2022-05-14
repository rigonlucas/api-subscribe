<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Update\Input;

class UpdateProcessTypeInput
{
    public function __construct(public readonly string $id, public readonly string $name, public readonly string $description)
    {
    }
}
