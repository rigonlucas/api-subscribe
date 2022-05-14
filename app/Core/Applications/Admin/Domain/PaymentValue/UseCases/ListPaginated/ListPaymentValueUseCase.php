<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\ListPaginated;

use App\Core\Applications\Admin\Domain\PaymentValue\Contracts\Repository\PaymentValueReadInterface;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\ListPaginated\Input\ListPaymentValueInput;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\ListPaginated\Output\ListPaymentValueOutput;
use App\Core\Support\Pagination\Inputs\PaginationInput;

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
