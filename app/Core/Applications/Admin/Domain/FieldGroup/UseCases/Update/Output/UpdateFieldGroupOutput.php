<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Update\Output;

class UpdateFieldGroupOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
