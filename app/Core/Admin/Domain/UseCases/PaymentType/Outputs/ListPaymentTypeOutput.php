<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType\Outputs;

class ListPaymentTypeOutput
{
    public function __construct(
        public readonly array $dados,
        public readonly ?array $meta = null,
        public readonly ?array $links = null
    )
    {
    }
}
