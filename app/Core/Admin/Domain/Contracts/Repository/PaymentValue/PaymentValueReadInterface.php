<?php

namespace App\Core\Admin\Domain\Contracts\Repository\PaymentValue;

use App\Core\Admin\Infra\Support\Pagination\Inputs\PaginationInput;

interface PaymentValueReadInterface
{

    public function listPaginated (PaginationInput $paginationInput, ?string $name = null): array;

    public function listAllCached (): array;

}
