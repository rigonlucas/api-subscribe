<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Restore;

use App\Core\Applications\Admin\Domain\PaymentValue\Contracts\Repository\PaymentValueWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Restore\Entities\PaymentValueRestoreEntity;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Restore\Input\RestorePaymentValueInput;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Restore\Output\RestorePaymentValueOutput;
use App\Core\Applications\Admin\Infra\Exceptions\PaymentValue\PaymentValueNotFoundException;

class RestorePaymentValueUseCase
{
    public function __construct(
        protected PaymentValueWriteInterface $paymentValueWrite
    )
    {
    }

    public function execute(RestorePaymentValueInput $input): RestorePaymentValueOutput
    {
        $paymentValueEntity = new PaymentValueRestoreEntity($input->id);

        $paymentId = $this->paymentValueWrite->restore($paymentValueEntity);

        if(!$paymentId) {
            throw new PaymentValueNotFoundException();
        }

        return new RestorePaymentValueOutput($paymentId);
    }
}
