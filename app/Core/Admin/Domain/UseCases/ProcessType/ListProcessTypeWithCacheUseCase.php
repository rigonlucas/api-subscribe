<?php

namespace App\Core\Admin\Domain\UseCases\ProcessType;

use App\Core\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeReadInterface;
use App\Core\Admin\Domain\UseCases\ProcessType\Outputs\ListProcessValueOutput;

class ListProcessTypeWithCacheUseCase
{
    public function __construct(
        protected ProcessTypeReadInterface $ProcessTypeRead
    )
    {
    }

    public function execute(): ListProcessValueOutput
    {
        return new ListProcessValueOutput(
            $this->ProcessTypeRead->listAllCached()
        );
    }
}
