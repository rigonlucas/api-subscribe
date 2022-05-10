<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup;

use App\Core\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupReadInterface;
use App\Core\Admin\Domain\UseCases\FieldGroup\Inputs\ListFieldGroupInput;
use App\Core\Admin\Domain\UseCases\FieldGroup\Outputs\ListFieldGroupOutput;
use App\Core\Admin\Infra\Support\Pagination\Inputs\PaginationInput;

class ListFieldGroupUseCase
{
    public function __construct(
        protected FieldGroupReadInterface $fieldGroupRead
    )
    {
    }

    public function execute(ListFieldGroupInput $input, PaginationInput $paginationInput): ListFieldGroupOutput
    {
        list($data, $meta) = $this->fieldGroupRead->listPaginated($paginationInput, $input->searchName);
        return new ListFieldGroupOutput($data, $meta);
    }
}
