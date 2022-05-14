<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository;

use App\Core\Support\Pagination\Inputs\PaginationInput;

interface ProcessTypeReadInterface
{

    public function listPaginated (PaginationInput $paginationInput, ?string $name = null): array;

    public function listAllCached (): array;

}
