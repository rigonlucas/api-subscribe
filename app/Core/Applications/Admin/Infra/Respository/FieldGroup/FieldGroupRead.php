<?php

namespace App\Core\Applications\Admin\Infra\Respository\FieldGroup;

use App\Core\Applications\Admin\Domain\FieldGroup\Contracts\Repository\FieldGroupReadInterface;
use App\Core\Applications\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Support\Cache\CacheManager;
use App\Core\Support\Pagination\Inputs\PaginationInput;
use App\Core\Support\Pagination\Inputs\PreparePagination;
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
