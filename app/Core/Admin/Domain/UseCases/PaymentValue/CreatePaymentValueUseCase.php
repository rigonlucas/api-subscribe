<?php

namespace App\Core\Admin\Domain\UseCases\PaymentValue;

use App\Core\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueWriteInterface;
use App\Core\Admin\Domain\Entities\Payment\PaymentValueEntity;
use App\Core\Admin\Domain\UseCases\PaymentValue\Inputs\CreatePaymentValueInput;
use App\Core\Admin\Domain\UseCases\PaymentValue\Outputs\CreatePaymentValueOutput;

class CreatePaymentValueUseCase
{
    public function __construct(
        protected PaymentValueWriteInterface $paymentValueWrite
    )
    {
    }

    public function execute(CreatePaymentValueInput $input): CreatePaymentValueOutput
    {
        $paymentValueEntity = new PaymentValueEntity($input->name, $input->value);

        $paymentId = $this->paymentValueWrite->store($paymentValueEntity);

        return new CreatePaymentValueOutput($paymentId);
    }
}
