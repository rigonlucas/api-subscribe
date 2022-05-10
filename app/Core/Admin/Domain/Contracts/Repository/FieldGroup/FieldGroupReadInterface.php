<?php

namespace App\Core\Admin\Domain\Contracts\Repository\FieldGroup;

use App\Core\Admin\Infra\Support\Pagination\Inputs\PaginationInput;

interface FieldGroupReadInterface
{

    public function listPaginated (PaginationInput $paginationInput, ?string $title = null): array;

    public function listAllCached (): array;

}
