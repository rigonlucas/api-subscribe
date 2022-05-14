<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\Contracts\Repository;


use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\Entities\PaymentValueDeleteEntity;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Restore\Entities\PaymentValueRestoreEntity;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\Entities\PaymentValueStoreEntity;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Update\Entities\PaymentValueUpdateEntity;

interface PaymentValueWriteInterface
{
    public function store (PaymentValueStoreEntity $paymentValueStoreEntity): string;

    public function update (PaymentValueUpdateEntity $paymentValueUpdateEntity): ?string;

    public function delete (PaymentValueDeleteEntity $paymentValueDeleteEntity): ?string;

    public function restore (PaymentValueRestoreEntity $paymentValueRestoreEntity): ?string;
}
