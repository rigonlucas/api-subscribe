<?php

namespace App\Core\Applications\Admin\Domain\Process\Contracts\Repository;

use App\Core\Support\Pagination\Inputs\PaginationInput;

interface ProcessReadInterface
{

    public function listPaginated (PaginationInput $paginationInput, ?string $name = null): array;

    public function listAllCached (): array;

}
