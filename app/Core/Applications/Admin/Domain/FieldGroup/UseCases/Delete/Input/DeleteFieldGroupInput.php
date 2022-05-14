<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\Input;

class DeleteFieldGroupInput
{
    public function __construct(public readonly string $id)
    {
    }
}
