<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\ListCached;

use App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository\PaymentTypeReadInterface;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\ListPaginated\Output\ListPaymentTypeOutput;

class ListPaymentTypeWithCacheUseCase
{
    public function __construct(
        protected PaymentTypeReadInterface $paymentTypeRead
    )
    {
    }

    public function execute(): ListPaymentTypeOutput
    {
        return new ListPaymentTypeOutput(
            $this->paymentTypeRead->listAllCached()
        );
    }
}
