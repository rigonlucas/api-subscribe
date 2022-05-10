<?php

namespace App\Core\Applications\Admin\Domain\UseCases\ProcessType;

use App\Core\Applications\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Process\ProcessTypeEntity;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\Inputs\UpdateProcessTypeInput;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\Outputs\UpdateProcessTypeOutput;
use App\Core\Applications\Admin\Infra\Exceptions\ProcessType\ProcessTypeNotFoundException;

class UpdateProcessTypeUseCase
{
    public function __construct(
        protected ProcessTypeWriteInterface $ProcessTypeWrite
    )
    {
    }

    public function execute(UpdateProcessTypeInput $input): UpdateProcessTypeOutput
    {
        $ProcessTypeEntity = new ProcessTypeEntity($input->name, $input->id);

        $ProcessId = $this->ProcessTypeWrite->update($ProcessTypeEntity);

        if(!$ProcessId) {
            throw new ProcessTypeNotFoundException();
        }

        return new UpdateProcessTypeOutput($ProcessId);
    }
}
