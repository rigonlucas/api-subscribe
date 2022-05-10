<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup\Inputs;

class ListFieldGroupInput
{
    public function __construct(public readonly ?string $searchName)
    {
    }
}
