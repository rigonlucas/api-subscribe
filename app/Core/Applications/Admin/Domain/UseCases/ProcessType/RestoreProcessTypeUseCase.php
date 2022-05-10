<?php

namespace App\Core\Applications\Admin\Domain\UseCases\ProcessType;

use App\Core\Applications\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Process\ProcessTypeEntity;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\Inputs\RestoreProcessTypeInput;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\Outputs\RestoreProcessTypeOutput;
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
        $ProcessTypeEntity = new ProcessTypeEntity('', $input->id);

        $ProcessId = $this->ProcessTypeWrite->restore($ProcessTypeEntity);

        if(!$ProcessId) {
            throw new ProcessTypeNotFoundException();
        }

        return new RestoreProcessTypeOutput($ProcessId);
    }
}
