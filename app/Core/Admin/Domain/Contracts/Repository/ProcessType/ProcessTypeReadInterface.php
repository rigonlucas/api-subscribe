<?php

namespace App\Core\Admin\Domain\Contracts\Repository\ProcessType;

use App\Core\Admin\Infra\Support\Pagination\Inputs\PaginationInput;

interface ProcessTypeReadInterface
{

    public function listPaginated (PaginationInput $paginationInput, ?string $name = null): array;

    public function listAllCached (): array;

}
