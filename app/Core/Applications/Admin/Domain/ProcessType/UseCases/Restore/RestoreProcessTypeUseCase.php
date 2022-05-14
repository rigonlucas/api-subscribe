<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Restore;

use App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository\ProcessTypeWriteInterface;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Restore\Entities\ProcessTypeRestoreEntity;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Restore\Input\RestoreProcessTypeInput;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Restore\Output\RestoreProcessTypeOutput;
use App\Core\Applications\Admin\Infra\Exceptions\ProcessType\ProcessTypeNotFoundException;

class RestoreProcessTypeUseCase
{
    public function __construct(
        protected ProcessTypeWriteInterface $ProcessTypeWrite
    )
    {
    }

    public function execute(RestoreProcessTypeInput $input): RestoreProcessTypeOutput
    {
        $ProcessTypeEntity = new ProcessTypeRestoreEntity($input->id);

        $ProcessId = $this->ProcessTypeWrite->restore($ProcessTypeEntity);

        if(!$ProcessId) {
            throw new ProcessTypeNotFoundException();
        }

        return new RestoreProcessTypeOutput($ProcessId);
    }
}
