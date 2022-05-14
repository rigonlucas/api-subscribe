<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\ListPaginated;

use App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository\ProcessTypeReadInterface;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\ListPaginated\Input\ListProcessTypeInput;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\ListPaginated\Output\ListProcessTypeOutput;
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
