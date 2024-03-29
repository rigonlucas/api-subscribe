<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store;

use App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository\PaymentTypeWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Entities\PaymentTypeStoreEntity;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Input\StorePaymentTypeInput;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Output\StorePaymentTypeOutput;

class StorePaymentTypeUseCase
{
    public function __construct(
        protected PaymentTypeWriteInterface $paymentTypeWrite
    )
    {
    }

    public function execute(StorePaymentTypeInput $input): StorePaymentTypeOutput
    {
        $paymentTypeEntity = new PaymentTypeStoreEntity($input->name);

        $paymentId = $this->paymentTypeWrite->store($paymentTypeEntity);

        return new StorePaymentTypeOutput($paymentId);
    }
}
