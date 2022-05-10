<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup;

use App\Core\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupReadInterface;
use App\Core\Admin\Domain\UseCases\FieldGroup\Outputs\ListFieldGroupOutput;

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
