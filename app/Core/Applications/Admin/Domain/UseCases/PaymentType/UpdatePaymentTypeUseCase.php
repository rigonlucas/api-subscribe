<?php

namespace App\Core\Applications\Admin\Domain\UseCases\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\ProcessTypeWriteInterface;
use App\Core\Admin\Domain\Exceptions\PaymentType\ProcessTypeNotFoundException;
use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Payment\PaymentTypeEntity;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\Inputs\UpdatePaymentTypeInput;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\Outputs\UpdatePaymentTypeOutput;
use App\Core\Applications\Admin\Infra\Exceptions\PaymentType\PaymentTypeNotFoundException;

class UpdatePaymentTypeUseCase
{
    public function __construct(
        protected PaymentTypeWriteInterface $paymentTypeWrite
    )
    {
    }

    public function execute(UpdatePaymentTypeInput $input): UpdatePaymentTypeOutput
    {
        $paymentTypeEntity = new PaymentTypeEntity($input->name, $input->id);

        $paymentId = $this->paymentTypeWrite->update($paymentTypeEntity);

        if(!$paymentId) {
            throw new PaymentTypeNotFoundException();
        }

        return new UpdatePaymentTypeOutput($paymentId);
    }
}
