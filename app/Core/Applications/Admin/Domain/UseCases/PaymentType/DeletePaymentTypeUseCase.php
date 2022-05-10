<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentType;

use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Payment\PaymentTypeEntity;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\Inputs\DeletePaymentTypeInput;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\Outputs\DeletePaymentTypeOutput;
use App\Core\Applications\Admin\Infra\Exceptions\PaymentType\PaymentTypeNotFoundException;

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
