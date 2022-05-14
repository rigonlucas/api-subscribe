<?php

namespace App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store;

use App\Core\Applications\Admin\Domain\FieldGroup\Contracts\Repository\FieldGroupWriteInterface;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\Entities\FieldGroupDeleteEntity;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store\Entities\FieldGroupStoreEntity;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store\Input\CreateFieldGroupInput;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store\Output\CreateFieldGroupOutput;

class CreateFieldGroupUseCase
{
    public function __construct(
        protected FieldGroupWriteInterface $fieldGroupWrite
    )
    {
    }

    public function execute(CreateFieldGroupInput $input): CreateFieldGroupOutput
    {
        $fieldGroupEntity = new FieldGroupStoreEntity($input->title, $input->description);

        $paymentId = $this->fieldGroupWrite->store($fieldGroupEntity);

        return new CreateFieldGroupOutput($paymentId);
    }
}
