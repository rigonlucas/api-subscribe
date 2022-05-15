<?php

namespace App\Core\Applications\Admin\Infra\Respository\Process;

use App\Core\Applications\Admin\Domain\Process\Contracts\Repository\ProcessReadInterface;
use App\Core\Support\Pagination\Inputs\PaginationInput;

class ProcessRead implements ProcessReadInterface
{

    public function listPaginated(PaginationInput $paginationInput, ?string $name = null): array
    {
        // TODO: Implement listPaginated() method.
    }

    public function listAllCached(): array
    {
        // TODO: Implement listAllCached() method.
    }
}
