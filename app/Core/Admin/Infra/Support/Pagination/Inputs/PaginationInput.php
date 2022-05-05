<?php

namespace App\Core\Admin\Infra\Support\Pagination\Inputs;

class PaginationInput
{
    public function __construct(
        private ?int $currentPage = 1,
        private ?int $perPage = 10
    )
    {
        if (!$this->currentPage) {
            $this->currentPage = 1;
        }

        if (!$this->perPage) {
            $this->perPage = 10;
        }
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }
}
