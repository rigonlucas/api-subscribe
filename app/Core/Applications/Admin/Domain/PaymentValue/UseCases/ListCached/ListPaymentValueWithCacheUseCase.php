<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\ListCached;

use App\Core\Applications\Admin\Domain\PaymentValue\Contracts\Repository\PaymentValueReadInterface;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\ListPaginated\Output\ListPaymentValueOutput;

class ListPaymentValueWithCacheUseCase
{
    public function __construct(
        protected PaymentValueReadInterface $paymentValueRead
    )
    {
    }

    public function execute(): ListPaymentValueOutput
    {
        return new ListPaymentValueOutput(
            $this->paymentValueRead->listAllCached()
        );
    }
}
