<?php

namespace App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository;

use App\Core\Support\Pagination\Inputs\PaginationInput;

interface PaymentTypeReadInterface
{

    public function listPaginated (PaginationInput $paginationInput, ?string $name = null): array;

    public function listAllCached (): array;

}
