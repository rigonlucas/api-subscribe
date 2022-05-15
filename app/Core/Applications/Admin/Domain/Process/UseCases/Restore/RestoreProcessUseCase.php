<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Restore;

use App\Core\Applications\Admin\Domain\Process\Contracts\Repository\ProcessWriteInterface;
use App\Core\Applications\Admin\Domain\Process\UseCases\Restore\Entities\ProcessRestoreEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Restore\Input\RestoreProcessInput;
use App\Core\Applications\Admin\Domain\Process\UseCases\Restore\Output\RestoreProcessOutput;
use App\Core\Applications\Admin\Infra\Exceptions\Process\ProcessNotFoundException;

class RestoreProcessUseCase
{
    public function __construct(
        private readonly ProcessWriteInterface $processWrite
    )
    {
    }

    public function execute (RestoreProcessInput $input): RestoreProcessOutput
    {
        $restored = $this->processWrite->restore(new ProcessRestoreEntity($input->id));
        if (!$restored) {
            throw new ProcessNotFoundException();
        }

        return new RestoreProcessOutput($input->id);
    }
}
