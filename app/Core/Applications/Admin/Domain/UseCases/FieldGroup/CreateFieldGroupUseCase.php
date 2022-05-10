<?php

namespace App\Core\Applications\Admin\Domain\UseCases\FieldGroup;

use App\Core\Applications\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Field\FieldGroupEntity;
use App\Core\Applications\Admin\Domain\UseCases\FieldGroup\Inputs\CreateFieldGroupInput;
use App\Core\Applications\Admin\Domain\UseCases\FieldGroup\Outputs\CreateFieldGroupOutput;

class CreateFieldGroupUseCase
{
    public function __construct(
        protected FieldGroupWriteInterface $fieldGroupWrite
    )
    {
    }

    public function execute(CreateFieldGroupInput $input): CreateFieldGroupOutput
    {
        $fieldGroupEntity = new FieldGroupEntity($input->title, $input->description);

        $paymentId = $this->fieldGroupWrite->store($fieldGroupEntity);

        return new CreateFieldGroupOutput($paymentId);
    }
}
