<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository;

use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete\Entities\ProcessTypeDeleteEntity;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Restore\Entities\ProcessTypeRestoreEntity;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\Entities\ProcessTypeStoreEntity;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Update\Entities\ProcessTypeUpdateEntity;

interface ProcessTypeWriteInterface
{
    public function store (ProcessTypeStoreEntity $processTypeStoreEntity): string;

    public function update (ProcessTypeUpdateEntity $processTypeUpdateEntity): ?string;

    public function delete (ProcessTypeDeleteEntity $processTypeDeleteEntity): ?string;

    public function restore (ProcessTypeRestoreEntity $processTypeRestoreEntity): ?string;
}
