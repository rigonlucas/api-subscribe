<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete;

use App\Core\Applications\Admin\Domain\PaymentValue\Contracts\Repository\PaymentValueWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\Entities\PaymentValueDeleteEntity;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\Input\DeletePaymentValueInput;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\Output\DeletePaymentValueOutput;
use App\Core\Applications\Admin\Infra\Exceptions\PaymentValue\PaymentValueNotFoundException;

class DeletePaymentValueUseCase
{
    public function __construct(
        protected PaymentValueWriteInterface $paymentValueWrite
    )
    {
    }

    public function execute(DeletePaymentValueInput $input): DeletePaymentValueOutput
    {
        $paymentValueEntity = new PaymentValueDeleteEntity($input->id);

        $paymentId = $this->paymentValueWrite->delete($paymentValueEntity);

        if(!$paymentId) {
            throw new PaymentValueNotFoundException();
        }

        return new DeletePaymentValueOutput($paymentId);
    }
}
