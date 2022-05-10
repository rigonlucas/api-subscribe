<?php

namespace App\Core\Admin\Domain\UseCases\ProcessType;

use App\Core\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeReadInterface;
use App\Core\Admin\Domain\UseCases\ProcessType\Outputs\ListProcessTypeOutput;

class ListProcessTypeWithCacheUseCase
{
    public function __construct(
        protected ProcessTypeReadInterface $ProcessTypeRead
    )
    {
    }

    public function execute(): ListProcessTypeOutput
    {
        return new ListProcessTypeOutput(
            $this->ProcessTypeRead->listAllCached()
        );
    }
}