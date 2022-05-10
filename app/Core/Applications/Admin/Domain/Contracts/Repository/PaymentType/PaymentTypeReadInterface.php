<?php

namespace App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentType;

use App\Core\Support\Pagination\Inputs\PaginationInput;

interface PaymentTypeReadInterface
{

    public function listPaginated (PaginationInput $paginationInput, ?string $name = null): array;

    public function listAllCached (): array;

}
