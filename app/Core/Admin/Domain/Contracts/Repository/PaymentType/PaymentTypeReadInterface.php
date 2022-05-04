<?php

namespace App\Core\Admin\Domain\Contracts\Repository\PaymentType;

interface PaymentTypeReadInterface
{

    public function listAll (int $paymentTypeId): array;

}
