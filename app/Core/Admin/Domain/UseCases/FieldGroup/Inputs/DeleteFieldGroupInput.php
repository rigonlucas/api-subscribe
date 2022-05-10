<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup\Inputs;

class DeleteFieldGroupInput
{
    public function __construct(public readonly string $id)
    {
    }
}
