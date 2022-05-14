<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository;



use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Delete\Entities\PaymentTypeDeleteEntity;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Restore\Entities\PaymentTypeRestoreEntity;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Entities\PaymentTypeStoreEntity;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Update\Entities\PaymentTypeUpdateEntity;

interface PaymentTypeWriteInterface
{
    public function store (PaymentTypeStoreEntity $paymentTypeStoreEntity): string;

    public function update (PaymentTypeUpdateEntity $paymentTypeUpdateEntity): ?string;

    public function delete (PaymentTypeDeleteEntity $paymentTypeDeleteEntity): ?string;

    public function restore (PaymentTypeRestoreEntity $paymentTypeRestoreEntity): ?string;
}
