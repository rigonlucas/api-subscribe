<?php

namespace App\Core\Admin\Domain\Entities\Process;

class ProcessTypeEntity
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly ?string $id = null
    )
    {
    }
}
