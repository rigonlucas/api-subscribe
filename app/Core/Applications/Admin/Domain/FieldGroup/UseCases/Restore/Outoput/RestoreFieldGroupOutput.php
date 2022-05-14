<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Restore\Outoput;

class RestoreFieldGroupOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
