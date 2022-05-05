<?php

namespace App\Core\Admin\Infra\Support\Pagination\Builder;

interface OutputPaginatorInterface
{
    public function build (): array;
}
