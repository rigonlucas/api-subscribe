<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentType;

use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeReadInterface;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\Outputs\ListPaymentTypeOutput;

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
