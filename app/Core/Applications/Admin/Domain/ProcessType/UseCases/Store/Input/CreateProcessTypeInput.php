<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\Input;

class CreateProcessTypeInput
{
    public function __construct(public readonly string $name, public readonly string $description)
    {
    }
}
