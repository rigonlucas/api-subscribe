<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentValue;

use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Payment\PaymentValueEntity;
use App\Core\Applications\Admin\Domain\UseCases\PaymentValue\Inputs\UpdatePaymentValueInput;
use App\Core\Applications\Admin\Domain\UseCases\PaymentValue\Outputs\UpdatePaymentValueOutput;
use App\Core\Applications\Admin\Infra\Exceptions\PaymentValue\PaymentValueNotFoundException;

class UpdatePaymentValueUseCase
{
    public function __construct(
        protected PaymentValueWriteInterface $paymentValueWrite
    )
    {
    }

    public function execute(UpdatePaymentValueInput $input): UpdatePaymentValueOutput
    {
        $paymentValueEntity = new PaymentValueEntity($input->name, $input->value, $input->id);

        $paymentId = $this->paymentValueWrite->update($paymentValueEntity);

        if(!$paymentId) {
            throw new PaymentValueNotFoundException();
        }

        return new UpdatePaymentValueOutput($paymentId);
    }
}
