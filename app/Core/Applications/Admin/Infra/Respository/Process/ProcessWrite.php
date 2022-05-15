<?php

namespace App\Core\Applications\Admin\Infra\Respository\Process;

use App\Core\Applications\Admin\Domain\Process\Contracts\Repository\ProcessWriteInterface;
use App\Core\Applications\Admin\Domain\Process\UseCases\Delete\Entities\ProcessDeleteEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Restore\Entities\ProcessRestoreEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Store\Entities\ProcessStoreEntity;
use App\Core\Applications\Admin\Domain\Process\UseCases\Update\Entities\ProcessUpdateEntity;
use App\Core\Applications\Admin\Infra\Exceptions\Process\ProcessNotFoundException;
use App\Core\Applications\Admin\Infra\Exceptions\ProcessType\ProcessTypeNotFoundException;
use App\Models\Process;
use App\Models\ProcessType;

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
            'process_type_id' => $processStoreEntity->processType->id,
            'start_at' => $processStoreEntity->startAt,
            'finish_at' => $processStoreEntity->finishAt,
        ]);

        return $processModel->id;
    }

    public function update(ProcessUpdateEntity $processUpdateEntity): bool
    {
        $processTypeModel = ProcessType::query()->find($processUpdateEntity->processType->id);
        if (!$processTypeModel) {
            throw new ProcessTypeNotFoundException();
        }

        return Process::query()->find($processUpdateEntity->id)->update([
            'name' => $processUpdateEntity->name,
            'description' => $processUpdateEntity->description,
            'tamb_link' => $processUpdateEntity->tambLink,
            'is_active' => $processUpdateEntity->active,
            'is_public' => $processUpdateEntity->public,
            'process_type_id' => $processUpdateEntity->processType->id,
            'start_at' => $processUpdateEntity->startAt,
            'finish_at' => $processUpdateEntity->finishAt,
        ]);
    }

    public function delete(ProcessDeleteEntity $processDeleteEntity): ProcessNotFoundException|bool
    {
        $processModel = Process::query()->find($processDeleteEntity->id);
        if (!$processModel) {
            return new ProcessNotFoundException();
        }
        //check if exists subscribes


        return $processModel->delete();
    }

    public function restore(ProcessRestoreEntity $processRestoreEntity): ?bool
    {
        $processModel = Process::onlyTrashed()->find($processRestoreEntity->id);
        if (!$processModel) {
            throw new ProcessNotFoundException();
        }

        return $processModel->restore();
    }
}
