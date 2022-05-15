<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store;

use App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository\PaymentTypeWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Entities\PaymentTypeStoreEntity;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Input\CreatePaymentTypeInput;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Output\CreatePaymentTypeOutput;

class StorePaymentTypeUseCase
{
    public function __construct(
        protected PaymentTypeWriteInterface $paymentTypeWrite
    )
    {
    }

    public function execute(CreatePaymentTypeInput $input): CreatePaymentTypeOutput
    {
        $paymentTypeEntity = new PaymentTypeStoreEntity($input->name);

        $paymentId = $this->paymentTypeWrite->store($paymentTypeEntity);

        return new CreatePaymentTypeOutput($paymentId);
    }
}
