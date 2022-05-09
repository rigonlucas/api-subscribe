<?php

namespace App\Core\Admin\Domain\Contracts\Repository\PaymentValue;


use App\Core\Admin\Domain\Entities\Payment\PaymentValueEntity;

interface PaymentValueWriteInterface
{
    public function store (PaymentValueEntity $paymentValueEntity): string;

    public function update (PaymentValueEntity $paymentValueEntity): ?string;

    public function delete (PaymentValueEntity $paymentValueEntity): ?string;

    public function restore (PaymentValueEntity $paymentValueEntity): ?string;
}
