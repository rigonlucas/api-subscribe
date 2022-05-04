<?php

namespace App\Core\Admin\Infra\Respository\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeReadInterface;

class PaymentTypeRead implements PaymentTypeReadInterface
{

    public function listAll(int $paymentTypeId): array
    {
        // TODO: Implement list() method.
    }
}
