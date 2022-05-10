<?php

namespace App\Core\Applications\Admin\Domain\UseCases\ProcessType\Outputs;

use App\Core\Support\Pagination\Builder\OutputPaginatorBuilder;

class ListProcessTypeOutput extends OutputPaginatorBuilder
{
    public function __construct(
        public readonly array $data,
        public readonly ?array $meta = null,
        public readonly ?array $links = null
    )
    {
    }
}
