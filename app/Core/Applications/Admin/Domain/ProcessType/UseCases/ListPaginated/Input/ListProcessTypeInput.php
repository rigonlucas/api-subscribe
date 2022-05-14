<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\ListPaginated\Input;

class ListProcessTypeInput
{
    public function __construct(public readonly ?string $searchName)
    {
    }
}
