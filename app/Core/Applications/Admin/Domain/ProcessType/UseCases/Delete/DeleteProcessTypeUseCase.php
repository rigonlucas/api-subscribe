<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete;

use App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository\ProcessTypeWriteInterface;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete\Entities\ProcessTypeDeleteEntity;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete\Input\DeleteProcessTypeInput;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete\Output\DeleteProcessTypeOutput;
use App\Core\Applications\Admin\Infra\Exceptions\ProcessType\ProcessTypeNotFoundException;

class DeleteProcessTypeUseCase
{
    public function __construct(
        protected ProcessTypeWriteInterface $ProcessTypeWrite
    )
    {
    }

    public function execute(DeleteProcessTypeInput $input): DeleteProcessTypeOutput
    {
        $ProcessTypeEntity = new ProcessTypeDeleteEntity($input->id);

        $ProcessId = $this->ProcessTypeWrite->delete($ProcessTypeEntity);

        if(!$ProcessId) {
            throw new ProcessTypeNotFoundException();
        }

        return new DeleteProcessTypeOutput($ProcessId);
    }
}
