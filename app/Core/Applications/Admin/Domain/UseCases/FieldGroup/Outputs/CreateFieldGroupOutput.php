<?php

namespace App\Core\Applications\Admin\Domain\UseCases\FieldGroup\Outputs;

class CreateFieldGroupOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
