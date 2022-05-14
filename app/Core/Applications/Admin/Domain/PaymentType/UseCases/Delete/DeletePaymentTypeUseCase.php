<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Delete;

use App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository\PaymentTypeWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Delete\Entities\PaymentTypeDeleteEntity;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Delete\Input\DeletePaymentTypeInput;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Delete\Output\DeletePaymentTypeOutput;
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
        $paymentTypeEntity = new PaymentTypeDeleteEntity($input->id);

        $paymentId = $this->paymentTypeWrite->delete($paymentTypeEntity);

        if(!$paymentId) {
            throw new PaymentTypeNotFoundException();
        }

        return new DeletePaymentTypeOutput($paymentId);
    }
}
