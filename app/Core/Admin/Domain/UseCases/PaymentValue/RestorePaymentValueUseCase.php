<?php

namespace App\Core\Admin\Domain\UseCases\PaymentValue;

use App\Core\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueWriteInterface;
use App\Core\Admin\Domain\Entities\Payment\PaymentValueEntity;
use App\Core\Admin\Domain\Exceptions\PaymentValue\PaymentValueNotFoundException;
use App\Core\Admin\Domain\UseCases\PaymentValue\Inputs\RestorePaymentValueInput;
use App\Core\Admin\Domain\UseCases\PaymentValue\Outputs\RestorePaymentValueOutput;

class RestorePaymentValueUseCase
{
    public function __construct(
        protected PaymentValueWriteInterface $paymentValueWrite
    )
    {
    }

    public function execute(RestorePaymentValueInput $input)
    {
        $paymentValueEntity = new PaymentValueEntity('', 0, $input->id);

        $paymentId = $this->paymentValueWrite->restore($paymentValueEntity);

        if(!$paymentId) {
            throw new PaymentValueNotFoundException();
        }

        return new RestorePaymentValueOutput($paymentId);
    }
}