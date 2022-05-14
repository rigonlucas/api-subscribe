<?php

namespace App\Core\Applications\Admin\Domain\ProcessType\UseCases\ListCached;

use App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository\ProcessTypeReadInterface;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\ListPaginated\Output\ListProcessTypeOutput;

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
