<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\ListPaginated\Input;

class ListFieldGroupInput
{
    public function __construct(public readonly ?string $searchTitleName)
    {
    }
}
