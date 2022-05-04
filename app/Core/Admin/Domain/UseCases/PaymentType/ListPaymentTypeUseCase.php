<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeReadInterface;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\ListPaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\Outputs\ListPaymentTypeOutput;
use App\Core\Admin\Infra\Support\Pagination\PaginationInput;

class ListPaymentTypeUseCase
{
    public function __construct(
        protected PaymentTypeReadInterface $paymentTypeRead
    )
    {
    }

    public function execute(ListPaymentTypeInput $input, PaginationInput $paginationInput): ListPaymentTypeOutput
    {
        $dados = $this->paymentTypeRead->listAll($paginationInput, $input->searchName);
dd($dados);
        return new ListPaymentTypeOutput([]);
    }
}
