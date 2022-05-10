<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentType;

use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Payment\PaymentTypeEntity;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\Inputs\RestorePaymentTypeInput;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\Outputs\RestorePaymentTypeOutput;
use App\Core\Applications\Admin\Infra\Exceptions\PaymentType\PaymentTypeNotFoundException;

class RestorePaymentTypeUseCase
{
    public function __construct(
        protected PaymentTypeWriteInterface $paymentTypeWrite
    )
    {
    }

    public function execute(RestorePaymentTypeInput $input): RestorePaymentTypeOutput
    {
        $paymentTypeEntity = new PaymentTypeEntity('', $input->id);

        $paymentId = $this->paymentTypeWrite->restore($paymentTypeEntity);

        if(!$paymentId) {
            throw new PaymentTypeNotFoundException();
        }

        return new RestorePaymentTypeOutput($paymentId);
    }
}
