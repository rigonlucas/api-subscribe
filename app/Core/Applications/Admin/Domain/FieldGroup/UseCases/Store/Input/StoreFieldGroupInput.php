<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store\Input;

class StoreFieldGroupInput
{
    public function __construct(public readonly string $title, public readonly string $description)
    {
    }
}
