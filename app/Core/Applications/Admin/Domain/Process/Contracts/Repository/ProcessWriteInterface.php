<?php

namespace App\Core\Applications\Admin\Domain\Process\Contracts\Repository;


use App\Core\Applications\Admin\Domain\Process\UseCases\Store\Entities\ProcessStoreEntity;

interface ProcessWriteInterface
{
    public function store (ProcessStoreEntity $processStoreEntity): string;

    public function update (ProcessUpdateEntity $processUpdateEntity): ?string;

    public function delete (ProcessDeleteEntity $processDeleteEntity): ?string;

    public function restore (ProcessRestoreEntity $processRestoreEntity): ?string;
}
