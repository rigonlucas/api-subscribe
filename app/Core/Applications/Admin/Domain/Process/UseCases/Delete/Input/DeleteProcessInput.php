<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Delete\Input;

class DeleteProcessInput
{
    public function __construct(public readonly string $id)
    {
    }

}
