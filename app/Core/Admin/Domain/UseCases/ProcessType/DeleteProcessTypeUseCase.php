<?php

namespace App\Core\Admin\Domain\UseCases\ProcessType;

use App\Core\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeWriteInterface;
use App\Core\Admin\Domain\Entities\Process\ProcessTypeEntity;
use App\Core\Admin\Domain\Exceptions\ProcessType\ProcessTypeNotFoundException;
use App\Core\Admin\Domain\UseCases\ProcessType\Inputs\DeleteProcessTypeInput;
use App\Core\Admin\Domain\UseCases\ProcessType\Outputs\DeleteProcessTypeOutput;

class DeleteProcessTypeUseCase
{
    public function __construct(
        protected ProcessTypeWriteInterface $ProcessTypeWrite
    )
    {
    }

    public function execute(DeleteProcessTypeInput $input)
    {
        $ProcessTypeEntity = new ProcessTypeEntity('', $input->id);

        $ProcessId = $this->ProcessTypeWrite->delete($ProcessTypeEntity);

        if(!$ProcessId) {
            throw new ProcessTypeNotFoundException();
        }

        return new DeleteProcessTypeOutput($ProcessId);
    }
}
