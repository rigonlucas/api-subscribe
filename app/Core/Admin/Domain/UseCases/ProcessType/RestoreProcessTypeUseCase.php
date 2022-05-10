<?php

namespace App\Core\Admin\Domain\UseCases\ProcessType;

use App\Core\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeWriteInterface;
use App\Core\Admin\Domain\Entities\Process\ProcessTypeEntity;
use App\Core\Admin\Domain\Exceptions\ProcessType\ProcessTypeNotFoundException;
use App\Core\Admin\Domain\UseCases\ProcessType\Inputs\RestoreProcessTypeInput;
use App\Core\Admin\Domain\UseCases\ProcessType\Outputs\RestoreProcessTypeOutput;

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