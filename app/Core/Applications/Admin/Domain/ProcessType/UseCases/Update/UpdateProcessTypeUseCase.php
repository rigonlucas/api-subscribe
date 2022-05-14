<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\Update;

use App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository\ProcessTypeWriteInterface;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Update\Entities\ProcessTypeUpdateEntity;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Update\Input\UpdateProcessTypeInput;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Update\Output\UpdateProcessTypeOutput;
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
        $ProcessTypeEntity = new ProcessTypeUpdateEntity($input->name, $input->description, $input->id);

        $ProcessId = $this->ProcessTypeWrite->update($ProcessTypeEntity);

        if(!$ProcessId) {
            throw new ProcessTypeNotFoundException();
        }

        return new UpdateProcessTypeOutput($ProcessId);
    }
}
