<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Restore;

use App\Core\Applications\Admin\Domain\FieldGroup\Contracts\Repository\FieldGroupWriteInterface;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Restore\Entities\FieldGroupRestoreEntity;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Restore\Input\RestoreFieldGroupInput;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Restore\Outoput\RestoreFieldGroupOutput;
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
        $fieldGroupEntity = new FieldGroupRestoreEntity($input->id);

        $paymentId = $this->fieldGroupWrite->restore($fieldGroupEntity);

        if(!$paymentId) {
            throw new FieldGroupNotFoundException();
        }

        return new RestoreFieldGroupOutput($paymentId);
    }
}
