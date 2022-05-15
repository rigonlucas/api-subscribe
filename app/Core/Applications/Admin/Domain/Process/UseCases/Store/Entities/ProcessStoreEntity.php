<?php

namespace App\Core\Applications\Admin\Domain\Process\UseCases\Store\Entities;

class ProcessStoreEntity
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly string $tambLink,
        public readonly bool $active,
        public readonly bool $public,
        public readonly ProcessTypeEntity $processTypeId,
        public readonly \DateTime $startAt,
        public readonly \DateTime $finishAt,
    )
    {
    }
}
