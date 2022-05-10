<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup\Inputs;

class RestoreFieldGroupInput
{
    public function __construct(public readonly string $id)
    {
    }
}
