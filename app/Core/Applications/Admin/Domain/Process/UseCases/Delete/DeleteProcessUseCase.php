<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Delete;

use App\Core\Applications\Admin\Domain\Process\Contracts\Repository\ProcessWriteInterface;
use App\Core\Applications\Admin\Domain\Process\UseCases\Delete\Entities\ProcessDeleteEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Delete\Input\DeleteProcessInput;
use App\Core\Applications\Admin\Domain\Process\UseCases\Delete\Output\DeleteProcessOutput;
use App\Core\Applications\Admin\Infra\Exceptions\Process\ProcessNotFoundException;
use Exception;

class DeleteProcessUseCase
{
    public function __construct(
        private readonly ProcessWriteInterface $processWrite
    )
    {

    }

    /**
     * @throws ProcessNotFoundException
     */
    public function execute (DeleteProcessInput $input): DeleteProcessOutput
    {
        $isDeleted = $this->processWrite->delete(new ProcessDeleteEntity($input->id));
        if ($isDeleted instanceof Exception) {
            throw new $isDeleted;
        }
        return new DeleteProcessOutput(
            $isDeleted
        );
    }
}
