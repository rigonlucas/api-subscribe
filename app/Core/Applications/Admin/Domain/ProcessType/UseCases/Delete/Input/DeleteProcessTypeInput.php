<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete\Input;

class DeleteProcessTypeInput
{
    public function __construct(public readonly string $id)
    {
    }
}
