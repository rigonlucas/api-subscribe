<?php

namespace App\Core\Applications\Admin\Domain\UseCases\FieldGroup;

use App\Core\Applications\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Field\FieldGroupEntity;
use App\Core\Applications\Admin\Domain\UseCases\FieldGroup\Inputs\RestoreFieldGroupInput;
use App\Core\Applications\Admin\Domain\UseCases\FieldGroup\Outputs\RestoreFieldGroupOutput;
use App\Core\Applications\Admin\Infra\Exceptions\FieldGroup\FieldGroupNotFoundException;

class RestoreFieldGroupUseCase
{
    public function __construct(
        protected FieldGroupWriteInterface $fieldGroupWrite
    )
    {
    }

    public function execute(RestoreFieldGroupInput $input): RestoreFieldGroupOutput
    {
        $fieldGroupEntity = new FieldGroupEntity('', '', $input->id);

        $paymentId = $this->fieldGroupWrite->restore($fieldGroupEntity);

        if(!$paymentId) {
            throw new FieldGroupNotFoundException();
        }

        return new RestoreFieldGroupOutput($paymentId);
    }
}
