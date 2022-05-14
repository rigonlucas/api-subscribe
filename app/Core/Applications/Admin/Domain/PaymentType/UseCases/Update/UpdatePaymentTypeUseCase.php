<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Update;

use App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository\PaymentTypeWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Update\Entities\PaymentTypeUpdateEntity;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Update\Input\UpdatePaymentTypeInput;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Update\Output\UpdatePaymentTypeOutput;
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
        $paymentTypeEntity = new PaymentTypeUpdateEntity($input->name, $input->id);

        $paymentId = $this->paymentTypeWrite->update($paymentTypeEntity);

        if(!$paymentId) {
            throw new PaymentTypeNotFoundException();
        }

        return new UpdatePaymentTypeOutput($paymentId);
    }
}
