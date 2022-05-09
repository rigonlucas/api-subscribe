<?php

namespace App\Core\Admin\Domain\UseCases\PaymentValue;

use App\Core\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueWriteInterface;
use App\Core\Admin\Domain\Entities\Payment\PaymentValueEntity;
use App\Core\Admin\Domain\Exceptions\PaymentValue\PaymentValueNotFoundException;
use App\Core\Admin\Domain\UseCases\PaymentValue\Inputs\UpdatePaymentValueInput;
use App\Core\Admin\Domain\UseCases\PaymentValue\Outputs\UpdatePaymentValueOutput;

class UpdatePaymentValueUseCase
{
    public function __construct(
        protected PaymentValueWriteInterface $paymentValueWrite
    )
    {
    }

    public function execute(UpdatePaymentValueInput $input)
    {
        $paymentValueEntity = new PaymentValueEntity($input->name, $input->value, $input->id);

        $paymentId = $this->paymentValueWrite->update($paymentValueEntity);

        if(!$paymentId) {
            throw new PaymentValueNotFoundException();
        }

        return new UpdatePaymentValueOutput($paymentId);
    }
}
