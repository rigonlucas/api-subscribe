<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Admin\Domain\Entities\Payment\PaymentTypesEntity;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\UpdatePaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\Outputs\UpdatePaymentTypeOutput;

class UpdatePaymentTypeUseCase
{
    public function __construct(
        protected PaymentTypeWriteInterface $paymentTypeWrite
    )
    {
    }

    public function execute(UpdatePaymentTypeInput $input)
    {
        $paymentTypeEntity = new PaymentTypesEntity($input->id, $input->name);

        $paymentId = $this->paymentTypeWrite->update($paymentTypeEntity);

        return new UpdatePaymentTypeOutput($paymentId);
    }
}
