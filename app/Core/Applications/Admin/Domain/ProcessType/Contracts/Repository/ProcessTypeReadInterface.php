<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository;

use App\Core\Applications\Admin\Domain\Process\UseCases\Store\Entities\ProcessTypeEntity;
use App\Core\Support\Pagination\Inputs\PaginationInput;

interface ProcessTypeReadInterface
{

    public function listPaginated (PaginationInput $paginationInput, ?string $name = null): array;

    public function listAllCached (): array;

    public function findProcessTypeById(string $id): ?ProcessTypeEntity;

}
