<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup\Outputs;

use App\Core\Admin\Infra\Support\Pagination\Builder\OutputPaginatorBuilder;

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
