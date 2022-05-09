<?php

namespace App\Core\Admin\Domain\UseCases\PaymentValue;

use App\Core\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueReadInterface;
use App\Core\Admin\Domain\UseCases\PaymentValue\Inputs\ListPaymentValueInput;
use App\Core\Admin\Domain\UseCases\PaymentValue\Outputs\ListPaymentValueOutput;
use App\Core\Admin\Infra\Support\Pagination\Inputs\PaginationInput;

class ListPaymentValueUseCase
{
    public function __construct(
        protected PaymentValueReadInterface $paymentValueRead
    )
    {
    }

    public function execute(ListPaymentValueInput $input, PaginationInput $paginationInput): ListPaymentValueOutput
    {
        list($data, $meta) = $this->paymentValueRead->listPaginated($paginationInput, $input->searchName);
        return new ListPaymentValueOutput($data, $meta);
    }
}
