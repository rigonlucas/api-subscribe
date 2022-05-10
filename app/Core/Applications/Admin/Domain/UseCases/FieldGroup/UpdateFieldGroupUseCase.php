<?php

namespace App\Core\Applications\Admin\Domain\UseCases\FieldGroup;

use App\Core\Applications\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Field\FieldGroupEntity;
use App\Core\Applications\Admin\Domain\UseCases\FieldGroup\Inputs\UpdateFieldGroupInput;
use App\Core\Applications\Admin\Domain\UseCases\FieldGroup\Outputs\UpdateFieldGroupOutput;
use App\Core\Applications\Admin\Infra\Exceptions\FieldGroup\FieldGroupNotFoundException;

class UpdateFieldGroupUseCase
{
    public function __construct(
        protected FieldGroupWriteInterface $fieldGroupTypeWrite
    )
    {
    }

    public function execute(UpdateFieldGroupInput $input): UpdateFieldGroupOutput
    {
        $fieldGroupTypeEntity = new FieldGroupEntity($input->title, $input->description, $input->id);

        $fieldGroupId = $this->fieldGroupTypeWrite->update($fieldGroupTypeEntity);

        if(!$fieldGroupId) {
            throw new FieldGroupNotFoundException();
        }

        return new UpdateFieldGroupOutput($fieldGroupId);
    }
}
