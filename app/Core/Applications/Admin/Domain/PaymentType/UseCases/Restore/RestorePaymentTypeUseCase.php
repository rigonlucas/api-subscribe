<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Restore;

use App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository\PaymentTypeWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Restore\Entities\PaymentTypeRestoreEntity;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Restore\Input\RestorePaymentTypeInput;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Restore\Output\RestorePaymentTypeOutput;
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
        $paymentTypeEntity = new PaymentTypeRestoreEntity($input->id);

        $paymentId = $this->paymentTypeWrite->restore($paymentTypeEntity);

        if(!$paymentId) {
            throw new PaymentTypeNotFoundException();
        }

        return new RestorePaymentTypeOutput($paymentId);
    }
}
