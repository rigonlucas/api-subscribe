<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Update\Entities;

use App\Core\Applications\Admin\Domain\Process\Rules\RuleDates;
use App\Core\Applications\Admin\Infra\Exceptions\Process\ProcessDateRangeInvalidException;

class ProcessUpdateEntity
{
    use RuleDates;

    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $tambLink,
        public readonly bool $active,
        public readonly bool $public,
        public readonly ProcessTypeEntity $processType,
        public readonly ?\DateTime $startAt,
        public readonly ?\DateTime $finishAt,
    )
    {
        $dateValidated = $this->applyDateRangeRule();
        if (!$dateValidated) {
            throw new ProcessDateRangeInvalidException();
        }
    }
}
