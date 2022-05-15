<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Store;

use App\Core\Applications\Admin\Domain\Process\Contracts\Repository\ProcessWriteInterface;
use App\Core\Applications\Admin\Domain\Process\UseCases\Store\Entities\ProcessStoreEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Store\Entities\ProcessTypeEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Store\Input\StoreProcessInput;
use App\Core\Applications\Admin\Domain\Process\UseCases\Store\Output\StoreProcessOutput;
use App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository\ProcessTypeReadInterface;
use App\Core\Applications\Admin\Infra\Exceptions\ProcessType\ProcessTypeNotFoundException;

class StoreProcessUseCase
{
    public function __construct(
        private readonly ProcessWriteInterface $processWrite,
        private readonly ProcessTypeReadInterface $processTypeWrite
    )
    {
    }

    public function execute(StoreProcessInput $input): StoreProcessOutput
    {
        $processTypeEntity = $this->processTypeWrite->findProcessTypeById($input->processTypeId);
        if (!$processTypeEntity) {
            throw new ProcessTypeNotFoundException();
        }
        $processEntity = new ProcessStoreEntity(
            $input->name,
            $input->description,
            $input->tambLink,
            $input->active,
            $input->public,
            $processTypeEntity,
            $input->getStartAt(),
            $input->getFinishAt()
        );
        $output = $this->processWrite->store($processEntity);
        dd($output);
        return new StoreProcessOutput($output);
    }
}
