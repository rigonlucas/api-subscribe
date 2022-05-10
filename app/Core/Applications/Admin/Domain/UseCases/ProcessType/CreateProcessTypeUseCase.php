<?php

namespace App\Core\Applications\Admin\Domain\UseCases\ProcessType;

use App\Core\Applications\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeWriteInterface;
use App\Core\Applications\Admin\Domain\Entities\Process\ProcessTypeEntity;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\Inputs\CreateProcessTypeInput;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\Outputs\CreateProcessTypeOutput;

class CreateProcessTypeUseCase
{
    public function __construct(
        protected ProcessTypeWriteInterface $ProcessTypeWrite
    )
    {
    }

    public function execute(CreateProcessTypeInput $input): CreateProcessTypeOutput
    {
        $ProcessTypeEntity = new ProcessTypeEntity($input->name, $input->description);

        $ProcessId = $this->ProcessTypeWrite->store($ProcessTypeEntity);

        return new CreateProcessTypeOutput($ProcessId);
    }
}
