<?php

namespace App\Core\Applications\Admin\Domain\Process\Contracts\Repository;


use App\Core\Applications\Admin\Domain\Process\UseCases\Delete\Entities\ProcessDeleteEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Restore\Entities\ProcessRestoreEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Store\Entities\ProcessStoreEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Update\Entities\ProcessUpdateEntity;

interface ProcessWriteInterface
{
    public function store (ProcessStoreEntity $processStoreEntity): string;

    public function update (ProcessUpdateEntity $processUpdateEntity): bool;

    public function delete (ProcessDeleteEntity $processDeleteEntity): ?string;

    public function restore (ProcessRestoreEntity $processRestoreEntity): ?string;
}
