<?php

namespace App\Core\Applications\Admin\Infra\Respository\Process;

use App\Core\Applications\Admin\Domain\Process\Contracts\Repository\ProcessWriteInterface;
use App\Core\Applications\Admin\Domain\Process\UseCases\Delete\Entities\ProcessDeleteEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Restore\Entities\ProcessRestoreEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Store\Entities\ProcessStoreEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Update\Entities\ProcessUpdateEntity;
use App\Models\Process;

class ProcessWrite implements ProcessWriteInterface
{

    public function store(ProcessStoreEntity $processStoreEntity): string
    {
        $processModel = Process::create([
            'name' => $processStoreEntity->name,
            'description' => $processStoreEntity->description,
            'tamb_link' => $processStoreEntity->tambLink,
            'is_active' => $processStoreEntity->active,
            'is_public' => $processStoreEntity->public,
            'process_type_id' => $processStoreEntity->processTypeId->id,
            'start_at' => $processStoreEntity->startAt,
            'finish_at' => $processStoreEntity->finishAt,
        ]);

        return $processModel->id;
    }

    public function update(ProcessUpdateEntity $processUpdateEntity): ?string
    {
        // TODO: Implement update() method.
    }

    public function delete(ProcessDeleteEntity $processDeleteEntity): ?string
    {
        // TODO: Implement delete() method.
    }

    public function restore(ProcessRestoreEntity $processRestoreEntity): ?string
    {
        // TODO: Implement restore() method.
    }
}