<?php

namespace App\Core\Admin\Domain\UseCases\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Admin\Domain\Entities\Payment\PaymentTypeEntity;
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

    public function execute(DeletePaymentTypeInput $input): DeletePaymentTypeOutput
    {
        $paymentTypeEntity = new PaymentTypeEntity('', $input->id);

        $paymentId = $this->paymentTypeWrite->delete($paymentTypeEntity);

        if(!$paymentId) {
            throw new PaymentTypeNotFoundException();
        }

        return new DeletePaymentTypeOutput($paymentId);
    }
}
