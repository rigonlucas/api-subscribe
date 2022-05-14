<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\Output;

class DeleteFieldGroupOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
