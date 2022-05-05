<?php

namespace App\Core\Admin\Infra\Support\Pagination\Builder;

abstract class OutputPaginatorBuilder implements OutputPaginatorInterface
{
    public function build(): array
    {
        $spread = $this->data;
        if ($this->meta) {
            $spread = [...$spread, ...$this->meta];
        }
        if ($this->links) {
            $spread = [...$spread, ...$this->links];
        }
        return $spread;
    }
}
