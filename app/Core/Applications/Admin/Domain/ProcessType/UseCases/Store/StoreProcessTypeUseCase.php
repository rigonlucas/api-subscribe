<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store;

use App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository\ProcessTypeWriteInterface;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete\Entities\ProcessTypeDeleteEntity;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\Entities\ProcessTypeStoreEntity;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\Input\StoreProcessTypeInput;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\Output\StoreProcessTypeOutput;

class StoreProcessTypeUseCase
{
    public function __construct(
        protected ProcessTypeWriteInterface $ProcessTypeWrite
    )
    {
    }

    public function execute(StoreProcessTypeInput $input): StoreProcessTypeOutput
    {
        $ProcessTypeEntity = new ProcessTypeStoreEntity($input->name, $input->description);

        $ProcessId = $this->ProcessTypeWrite->store($ProcessTypeEntity);

        return new StoreProcessTypeOutput($ProcessId);
    }
}
