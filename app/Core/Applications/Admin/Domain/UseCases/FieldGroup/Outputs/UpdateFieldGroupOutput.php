<?php

namespace App\Core\Applications\Admin\Domain\UseCases\FieldGroup\Outputs;

class UpdateFieldGroupOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
