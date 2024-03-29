<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\ListPaginated\Output;

use App\Core\Support\Pagination\Builder\OutputPaginatorBuilder;

class ListPaymentValueOutput extends OutputPaginatorBuilder
{
    public function __construct(
        public readonly array $data,
        public readonly ?array $meta = null,
        public readonly ?array $links = null
    )
    {
    }
}
