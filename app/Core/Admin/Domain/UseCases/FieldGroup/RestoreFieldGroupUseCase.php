<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup;

use App\Core\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupWriteInterface;
use App\Core\Admin\Domain\Entities\Field\FieldGroupEntity;
use App\Core\Admin\Domain\Exceptions\FieldGroup\FieldGroupNotFoundException;
use App\Core\Admin\Domain\UseCases\FieldGroup\Inputs\RestoreFieldGroupInput;
use App\Core\Admin\Domain\UseCases\FieldGroup\Outputs\RestoreFieldGroupOutput;

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
