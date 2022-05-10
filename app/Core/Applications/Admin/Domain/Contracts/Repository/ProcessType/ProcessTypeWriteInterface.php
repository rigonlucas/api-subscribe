<?php

namespace App\Core\Applications\Admin\Domain\Contracts\Repository\ProcessType;

use App\Core\Applications\Admin\Domain\Entities\Process\ProcessTypeEntity;

interface ProcessTypeWriteInterface
{
    public function store (ProcessTypeEntity $processTypeEntity): string;

    public function update (ProcessTypeEntity $processTypeEntity): ?string;

    public function delete (ProcessTypeEntity $processTypeEntity): ?string;

    public function restore (ProcessTypeEntity $processTypeEntity): ?string;
}
