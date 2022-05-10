<?php

namespace App\Core\Admin\Infra\Respository\FieldGroup;

use App\Core\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupReadInterface;
use App\Core\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Admin\Infra\Support\Cache\CacheManager;
use App\Core\Admin\Infra\Support\Pagination\Inputs\PaginationInput;
use App\Core\Admin\Infra\Support\Pagination\Inputs\PreparePagination;
use App\Models\FieldGroups;
use Illuminate\Support\Facades\DB;

class FieldGroupRead extends PreparePagination implements FieldGroupReadInterface
{
    use CacheManager;

    public function listPaginated(PaginationInput $paginationInput, ?string $title = null): array
    {
        $paymentTypeModel = FieldGroups::withTrashed()->select([
            'id',
            'title',
            'created_at',
            'deleted_at'
        ]);
        $paymentTypeModel->when(
            $title,
            fn($query) => $query->where('title', 'like', '%'.$title.'%')
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
            CacheKeysEnum::PREFIX_FIELD_GROUP->value,
            DB::table('field_groups')
                ->select(['id', 'title'])
                ->whereNull('deleted_at')
                ->orderBy('title')
        )->toArray();
    }
}
