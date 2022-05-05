<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType\Outputs;

use App\Core\Admin\Infra\Support\Pagination\Builder\OutputPaginatorBuilder;

class ListPaymentTypeOutput extends OutputPaginatorBuilder
{
    public function __construct(
        public readonly array $data,
        public readonly ?array $meta = null,
        public readonly ?array $links = null
    )
    {
    }
}
