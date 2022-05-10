<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentValue;

use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Payment\PaymentValueEntity;
use App\Core\Applications\Admin\Domain\UseCases\PaymentValue\Inputs\RestorePaymentValueInput;
use App\Core\Applications\Admin\Domain\UseCases\PaymentValue\Outputs\RestorePaymentValueOutput;
use App\Core\Applications\Admin\Infra\Exceptions\PaymentValue\PaymentValueNotFoundException;

class RestorePaymentValueUseCase
{
    public function __construct(
        protected PaymentValueWriteInterface $paymentValueWrite
    )
    {
    }

    public function execute(RestorePaymentValueInput $input): RestorePaymentValueOutput
    {
        $paymentValueEntity = new PaymentValueEntity('', 0, $input->id);

        $paymentId = $this->paymentValueWrite->restore($paymentValueEntity);

        if(!$paymentId) {
            throw new PaymentValueNotFoundException();
        }

        return new RestorePaymentValueOutput($paymentId);
    }
}
