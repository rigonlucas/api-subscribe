<?php

namespace App\Core\Applications\Admin\Domain\UseCases\FieldGroup\Outputs;

use App\Core\Support\Pagination\Builder\OutputPaginatorBuilder;

class ListFieldGroupOutput extends OutputPaginatorBuilder
{
    public function __construct(
        public readonly array $data,
        public readonly ?array $meta = null,
        public readonly ?array $links = null
    )
    {
    }
}
