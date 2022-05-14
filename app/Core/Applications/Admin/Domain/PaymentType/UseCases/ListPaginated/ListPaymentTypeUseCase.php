<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\ListPaginated;

use App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository\PaymentTypeReadInterface;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\ListPaginated\Input\ListPaymentTypeInput;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\ListPaginated\Output\ListPaymentTypeOutput;
use App\Core\Support\Pagination\Inputs\PaginationInput;

class ListPaymentTypeUseCase
{
    public function __construct(
        protected PaymentTypeReadInterface $paymentTypeRead
    )
    {
    }

    public function execute(ListPaymentTypeInput $input, PaginationInput $paginationInput): ListPaymentTypeOutput
    {
        list($data, $meta) = $this->paymentTypeRead->listPaginated($paginationInput, $input->searchName);
        return new ListPaymentTypeOutput($data, $meta);
    }
}
