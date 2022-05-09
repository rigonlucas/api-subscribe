<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeReadInterface;
use App\Core\Admin\Domain\UseCases\PaymentType\Outputs\ListPaymentValueOutput;

class ListPaymentTypeWithCacheUseCase
{
    public function __construct(
        protected PaymentTypeReadInterface $paymentTypeRead
    )
    {
    }

    public function execute(): ListPaymentValueOutput
    {
        return new ListPaymentValueOutput(
            $this->paymentTypeRead->listAllCached()
        );
    }
}
