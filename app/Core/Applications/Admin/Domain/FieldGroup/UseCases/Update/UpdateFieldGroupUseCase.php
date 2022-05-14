<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Update;

use App\Core\Applications\Admin\Domain\FieldGroup\Contracts\Repository\FieldGroupWriteInterface;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\Entities\FieldGroupDeleteEntity;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Update\Entities\FieldGroupUpdateEntity;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Update\Input\UpdateFieldGroupInput;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Update\Output\UpdateFieldGroupOutput;
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
        $fieldGroupTypeEntity = new FieldGroupUpdateEntity($input->title, $input->description, $input->id);

        $fieldGroupId = $this->fieldGroupTypeWrite->update($fieldGroupTypeEntity);

        if(!$fieldGroupId) {
            throw new FieldGroupNotFoundException();
        }

        return new UpdateFieldGroupOutput($fieldGroupId);
    }
}
