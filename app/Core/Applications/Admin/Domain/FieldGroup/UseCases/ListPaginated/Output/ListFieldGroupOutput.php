<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\ListPaginated\Output;

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
