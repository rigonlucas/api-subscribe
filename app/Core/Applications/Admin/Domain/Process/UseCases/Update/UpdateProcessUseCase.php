<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Update;

use App\Core\Applications\Admin\Domain\Process\Contracts\Repository\ProcessWriteInterface;
use App\Core\Applications\Admin\Domain\Process\UseCases\Update\Entities\ProcessTypeEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Update\Entities\ProcessUpdateEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Update\Input\UpdateProcessInput;
use App\Core\Applications\Admin\Domain\Process\UseCases\Update\Output\UpdateProcessOutput;

class UpdateProcessUseCase
{
    public function __construct(
        private readonly ProcessWriteInterface $processWrite,
    )
    {
    }

    public function execute(UpdateProcessInput $input): UpdateProcessOutput
    {
        $processEntity = new ProcessUpdateEntity(
            $input->id,
            $input->name,
            $input->description,
            $input->tambLink,
            $input->active,
            $input->public,
            new ProcessTypeEntity($input->processTypeId),
            $input->getStartAt(),
            $input->getFinishAt()
        );
        $output = $this->processWrite->update($processEntity);
        return new UpdateProcessOutput($output);
    }

}
