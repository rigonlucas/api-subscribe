<?php

namespace App\Core\Applications\Admin\Domain\UseCases\FieldGroup\Inputs;

class ListFieldGroupInput
{
    public function __construct(public readonly ?string $searchTitleName)
    {
    }
}
