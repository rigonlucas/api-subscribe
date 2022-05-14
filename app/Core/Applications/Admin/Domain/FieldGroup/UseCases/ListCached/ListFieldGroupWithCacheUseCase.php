<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\ListCached;

use App\Core\Applications\Admin\Domain\FieldGroup\Contracts\Repository\FieldGroupReadInterface;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\ListPaginated\Output\ListFieldGroupOutput;

class ListFieldGroupWithCacheUseCase
{
    public function __construct(
        protected FieldGroupReadInterface $fieldGroupRead
    )
    {
    }

    public function execute(): ListFieldGroupOutput
    {
        return new ListFieldGroupOutput(
            $this->fieldGroupRead->listAllCached()
        );
    }
}
