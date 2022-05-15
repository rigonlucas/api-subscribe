<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\Input;

class StoreProcessTypeInput
{
    public function __construct(public readonly string $name, public readonly string $description)
    {
    }
}
