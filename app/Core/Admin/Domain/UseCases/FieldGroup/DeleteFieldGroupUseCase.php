<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup;

use App\Core\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupWriteInterface;
use App\Core\Admin\Domain\Entities\Field\FieldGroupEntity;
use App\Core\Admin\Domain\UseCases\FieldGroup\Inputs\DeleteFieldGroupInput;
use App\Core\Admin\Domain\UseCases\FieldGroup\Outputs\DeleteFieldGroupOutput;
use App\Core\Admin\Infra\Exceptions\FieldGroup\FieldGroupNotFoundException;

class DeleteFieldGroupUseCase
{
    public function __construct(
        protected FieldGroupWriteInterface $fieldGroupWrite
    )
    {
    }

    public function execute(DeleteFieldGroupInput $input): DeleteFieldGroupOutput
    {
        $fieldGroupEntity = new FieldGroupEntity('', '', $input->id);

        $paymentId = $this->fieldGroupWrite->delete($fieldGroupEntity);

        if(!$paymentId) {
            throw new FieldGroupNotFoundException();
        }

        return new DeleteFieldGroupOutput($paymentId);
    }
}
