<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\ListPaginated;

use App\Core\Applications\Admin\Domain\FieldGroup\Contracts\Repository\FieldGroupReadInterface;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\ListPaginated\Input\ListFieldGroupInput;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\ListPaginated\Output\ListFieldGroupOutput;
use App\Core\Support\Pagination\Inputs\PaginationInput;

class ListFieldGroupUseCase
{
    public function __construct(
        protected FieldGroupReadInterface $fieldGroupRead
    )
    {
    }

    public function execute(ListFieldGroupInput $input, PaginationInput $paginationInput): ListFieldGroupOutput
    {
        list($data, $meta) = $this->fieldGroupRead->listPaginated($paginationInput, $input->searchTitleName);
        return new ListFieldGroupOutput($data, $meta);
    }
}
