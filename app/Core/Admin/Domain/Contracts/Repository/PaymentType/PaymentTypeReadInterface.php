<?php

namespace App\Core\Admin\Domain\Contracts\Repository\PaymentType;

use App\Core\Admin\Infra\Support\Pagination\Inputs\PaginationInput;

interface PaymentTypeReadInterface
{

    public function listAll (PaginationInput $paginationInput, ?string $name = null): array;

}
