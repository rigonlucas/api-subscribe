<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Update;

use App\Core\Applications\Admin\Domain\PaymentValue\Contracts\Repository\PaymentValueWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\Entities\PaymentValueDeleteEntity;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Update\Entities\PaymentValueUpdateEntity;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Update\Input\UpdatePaymentValueInput;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Update\Output\UpdatePaymentValueOutput;
use App\Core\Applications\Admin\Infra\Exceptions\PaymentValue\PaymentValueNotFoundException;

class UpdatePaymentValueUseCase
{
    public function __construct(
        protected PaymentValueWriteInterface $paymentValueWrite
    )
    {
    }

    public function execute(UpdatePaymentValueInput $input): UpdatePaymentValueOutput
    {
        $paymentValueEntity = new PaymentValueUpdateEntity($input->name, $input->value, $input->id);

        $paymentId = $this->paymentValueWrite->update($paymentValueEntity);

        if(!$paymentId) {
            throw new PaymentValueNotFoundException();
        }

        return new UpdatePaymentValueOutput($paymentId);
    }
}
