<?php

namespace App\Core\Admin\Infra\Respository\ProcessType;

use App\Core\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeReadInterface;
use App\Core\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Admin\Infra\Support\Cache\CacheManager;
use App\Core\Admin\Infra\Support\Pagination\Inputs\PaginationInput;
use App\Core\Admin\Infra\Support\Pagination\Inputs\PreparePagination;
use App\Models\ProcessType;
use Illuminate\Support\Facades\DB;

class ProcessTypeRead extends PreparePagination implements ProcessTypeReadInterface
{
    use CacheManager;

    public function listPaginated(PaginationInput $paginationInput, ?string $name = null): array
    {
        $paymentTypeModel = ProcessType::withTrashed()->select([
            'id',
            'name',
            'description',
            'created_at',
            'deleted_at'
        ]);
        $paymentTypeModel->when(
            $name,
            fn($query) => $query->where('name', 'like', '%'.$name.'%')
        );

        return $this->preparePagination(
            $paymentTypeModel->paginate(
                $paginationInput->getPerPage()
            )->toArray()
        );
    }

    public function listAllCached(): array
    {
        return $this->createCache(
            CacheKeysEnum::PREFIX_PROCESS_TYPE->value,
            DB::table('process_types')
                ->select(['id', 'name', 'description'])
                ->whereNull('deleted_at')
                ->orderBy('name')
        )->toArray();
    }
}
