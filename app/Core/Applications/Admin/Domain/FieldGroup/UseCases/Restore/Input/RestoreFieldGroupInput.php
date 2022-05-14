<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Restore\Input;

class RestoreFieldGroupInput
{
    public function __construct(public readonly string $id)
    {
    }
}
