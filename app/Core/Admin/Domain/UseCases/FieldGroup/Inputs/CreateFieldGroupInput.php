<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup\Inputs;

class CreateFieldGroupInput
{
    public function __construct(public readonly string $title, public readonly string $description)
    {
    }
}
