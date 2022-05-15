<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Store\Entities;

use App\Core\Applications\Admin\Domain\Process\Rules\RuleDates;
use App\Core\Applications\Admin\Infra\Exceptions\Process\ProcessDateRangeInvalidException;

class ProcessStoreEntity
{
    use RuleDates;

    public function __construct(
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
