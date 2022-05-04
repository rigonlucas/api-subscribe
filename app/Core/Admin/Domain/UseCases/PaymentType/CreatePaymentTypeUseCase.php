<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Admin\Domain\Entities\Payment\PaymentTypesEntity;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\CreatePaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\Outputs\CreatePaymentTypeOutput;

class CreatePaymentTypeUseCase
{
    public function __construct(
        protected PaymentTypeWriteInterface $paymentTypeWrite
    )
    {
    }

    public function execute(CreatePaymentTypeInput $input): CreatePaymentTypeOutput
    {
        $paymentTypeEntity = new PaymentTypesEntity(null, $input->name);

        $paymentId = $this->paymentTypeWrite->store($paymentTypeEntity);

        return new CreatePaymentTypeOutput($paymentId);
    }
}
