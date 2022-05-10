<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup\Outputs;

class CreateFieldGroupOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
