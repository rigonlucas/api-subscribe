<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentType;

use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeReadInterface;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\Inputs\ListPaymentTypeInput;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\Outputs\ListPaymentTypeOutput;
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
