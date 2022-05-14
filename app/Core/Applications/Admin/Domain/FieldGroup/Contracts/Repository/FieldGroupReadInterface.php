<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\Contracts\Repository;

use App\Core\Support\Pagination\Inputs\PaginationInput;

interface FieldGroupReadInterface
{

    public function listPaginated (PaginationInput $paginationInput, ?string $title = null): array;

    public function listAllCached (): array;

}
