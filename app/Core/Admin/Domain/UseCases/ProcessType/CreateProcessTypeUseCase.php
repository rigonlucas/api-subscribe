<?php

namespace App\Core\Admin\Domain\UseCases\ProcessType;

use App\Core\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeWriteInterface;
use App\Core\Admin\Domain\Entities\Process\ProcessTypeEntity;
use App\Core\Admin\Domain\UseCases\ProcessType\Inputs\CreateProcessTypeInput;
use App\Core\Admin\Domain\UseCases\ProcessType\Outputs\CreateProcessTypeOutput;

class CreateProcessTypeUseCase
{
    public function __construct(
        protected ProcessTypeWriteInterface $ProcessTypeWrite
    )
    {
    }

    public function execute(CreateProcessTypeInput $input): CreateProcessTypeOutput
    {
        $ProcessTypeEntity = new ProcessTypeEntity($input->name, null);

        $ProcessId = $this->ProcessTypeWrite->store($ProcessTypeEntity);

        return new CreateProcessTypeOutput($ProcessId);
    }
}
