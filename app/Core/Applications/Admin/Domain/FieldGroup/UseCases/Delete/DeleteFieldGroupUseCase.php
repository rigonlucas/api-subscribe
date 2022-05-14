<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete;

use App\Core\Applications\Admin\Domain\FieldGroup\Contracts\Repository\FieldGroupWriteInterface;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\Entities\FieldGroupDeleteEntity;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\Input\DeleteFieldGroupInput;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\Output\DeleteFieldGroupOutput;
use App\Core\Applications\Admin\Infra\Exceptions\FieldGroup\FieldGroupNotFoundException;

class DeleteFieldGroupUseCase
{
    public function __construct(
        protected FieldGroupWriteInterface $fieldGroupWrite
    )
    {
    }

    public function execute(DeleteFieldGroupInput $input): DeleteFieldGroupOutput
    {
        $fieldGroupEntity = new FieldGroupDeleteEntity($input->id);

        $paymentId = $this->fieldGroupWrite->delete($fieldGroupEntity);

        if(!$paymentId) {
            throw new FieldGroupNotFoundException();
        }

        return new DeleteFieldGroupOutput($paymentId);
    }
}
