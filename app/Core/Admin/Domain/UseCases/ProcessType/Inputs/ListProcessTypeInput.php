<?php

namespace App\Core\Admin\Domain\UseCases\ProcessType\Inputs;

class ListProcessTypeInput
{
    public function __construct(public readonly ?string $searchName)
    {
    }
}
