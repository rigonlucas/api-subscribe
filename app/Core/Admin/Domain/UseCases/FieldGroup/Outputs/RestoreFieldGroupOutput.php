<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup\Outputs;

class RestoreFieldGroupOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
