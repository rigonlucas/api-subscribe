<?php

namespace App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentValue;

use App\Core\Support\Pagination\Inputs\PaginationInput;

interface PaymentValueReadInterface
{

    public function listPaginated (PaginationInput $paginationInput, ?string $name = null): array;

    public function listAllCached (): array;

}
