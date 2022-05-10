<?php

namespace App\Core\Applications\Admin\Domain\UseCases\ProcessType;

use App\Core\Applications\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeReadInterface;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\Inputs\ListProcessTypeInput;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\Outputs\ListProcessTypeOutput;
use App\Core\Support\Pagination\Inputs\PaginationInput;

class ListProcessTypeUseCase
{
    public function __construct(
        protected ProcessTypeReadInterface $ProcessTypeRead
    )
    {
    }

    public function execute(ListProcessTypeInput $input, PaginationInput $paginationInput): ListProcessTypeOutput
    {
        list($data, $meta) = $this->ProcessTypeRead->listPaginated($paginationInput, $input->searchName);
        return new ListProcessTypeOutput($data, $meta);
    }
}
