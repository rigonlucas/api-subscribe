<?php

namespace App\Core\Admin\Domain\UseCases\PaymentValue;

use App\Core\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueWriteInterface;
use App\Core\Admin\Domain\Entities\Payment\PaymentValueEntity;
use App\Core\Admin\Domain\UseCases\PaymentValue\Inputs\DeletePaymentValueInput;
use App\Core\Admin\Domain\UseCases\PaymentValue\Outputs\DeletePaymentValueOutput;
use App\Core\Admin\Infra\Exceptions\PaymentValue\PaymentValueNotFoundException;

class DeletePaymentValueUseCase
{
    public function __construct(
        protected PaymentValueWriteInterface $paymentValueWrite
    )
    {
    }

    public function execute(DeletePaymentValueInput $input): DeletePaymentValueOutput
    {
        $paymentValueEntity = new PaymentValueEntity('', 0, $input->id);

        $paymentId = $this->paymentValueWrite->delete($paymentValueEntity);

        if(!$paymentId) {
            throw new PaymentValueNotFoundException();
        }

        return new DeletePaymentValueOutput($paymentId);
    }
}
