<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store;

use App\Core\Applications\Admin\Domain\PaymentValue\Contracts\Repository\PaymentValueWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\Entities\PaymentValueDeleteEntity;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\Entities\PaymentValueStoreEntity;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\Input\CreatePaymentValueInput;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\Output\CreatePaymentValueOutput;

class StorePaymentValueUseCase
{
    public function __construct(
        protected PaymentValueWriteInterface $paymentValueWrite
    )
    {
    }

    public function execute(CreatePaymentValueInput $input): CreatePaymentValueOutput
    {
        $paymentValueEntity = new PaymentValueStoreEntity($input->name, $input->value);

        $paymentId = $this->paymentValueWrite->store($paymentValueEntity);

        return new CreatePaymentValueOutput($paymentId);
    }
}
