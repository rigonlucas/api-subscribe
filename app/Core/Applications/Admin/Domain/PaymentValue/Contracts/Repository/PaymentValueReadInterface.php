<?php

namespace App\Core\Applications\Admin\Domain\PaymentValue\Contracts\Repository;

use App\Core\Support\Pagination\Inputs\PaginationInput;

interface PaymentValueReadInterface
{

    public function listPaginated (PaginationInput $paginationInput, ?string $name = null): array;

    public function listAllCached (): array;

}
