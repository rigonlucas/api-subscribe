<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentValue;

use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueReadInterface;
use App\Core\Applications\Admin\Domain\UseCases\PaymentValue\Outputs\ListPaymentValueOutput;

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
