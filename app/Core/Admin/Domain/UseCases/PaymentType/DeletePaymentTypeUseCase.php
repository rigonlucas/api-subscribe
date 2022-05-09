<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Admin\Domain\Entities\Payment\PaymentTypesEntity;
use App\Core\Admin\Domain\Exceptions\PaymentType\PaymentTypeNotFoundException;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\DeletePaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\Outputs\DeletePaymentTypeOutput;

class DeletePaymentTypeUseCase
{
    public function __construct(
        protected PaymentTypeWriteInterface $paymentTypeWrite
    )
    {
    }

    public function execute(DeletePaymentTypeInput $input)
    {
        $paymentTypeEntity = new PaymentTypesEntity('', $input->id);

        $paymentId = $this->paymentTypeWrite->delete($paymentTypeEntity);

        if(!$paymentId) {
            throw new PaymentTypeNotFoundException();
        }

        return new DeletePaymentTypeOutput($paymentId);
    }
}
