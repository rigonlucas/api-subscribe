<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup\Outputs;

class DeleteFieldGroupOutput
{
    public function __construct(public readonly string $id)
    {
    }
}