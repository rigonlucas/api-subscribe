<?php

namespace App\Core\Admin\Domain\UseCases\FieldGroup;

use App\Core\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupWriteInterface;
use App\Core\Admin\Domain\Entities\Field\FieldGroupEntity;
use App\Core\Admin\Domain\UseCases\FieldGroup\Inputs\CreateFieldGroupInput;
use App\Core\Admin\Domain\UseCases\FieldGroup\Outputs\CreateFieldGroupOutput;

class CreateFieldGroupUseCase
{
    public function __construct(
        protected FieldGroupWriteInterface $fieldGroupWrite
    )
    {
    }

    public function execute(CreateFieldGroupInput $input): CreateFieldGroupOutput
    {
        $fieldGroupEntity = new FieldGroupEntity($input->name, $input->description);

        $paymentId = $this->fieldGroupWrite->store($fieldGroupEntity);

        return new CreateFieldGroupOutput($paymentId);
    }
}
