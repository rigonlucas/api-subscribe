<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store\Output;

class StoreFieldGroupOutput
{
    public function __construct(public readonly string $id)
    {
    }
}
