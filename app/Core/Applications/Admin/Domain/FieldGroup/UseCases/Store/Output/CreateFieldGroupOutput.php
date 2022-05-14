<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store\Output;

class CreateFieldGroupOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
