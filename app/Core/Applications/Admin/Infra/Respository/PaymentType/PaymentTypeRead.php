<?php

namespace App\Core\Applications\Admin\Infra\Respository\PaymentType;

use App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository\PaymentTypeReadInterface;
use App\Core\Applications\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Support\Cache\CacheManager;
use App\Core\Support\Pagination\Inputs\PaginationInput;
use App\Core\Support\Pagination\Inputs\PreparePagination;
use App\Models\PaymentType;
use Illuminate\Support\Facades\DB;

class PaymentTypeRead extends PreparePagination implements PaymentTypeReadInterface
{
    use CacheManager;

    public function listPaginated(PaginationInput $paginationInput, ?string $name = null): array
    {
        $paymentTypeModel = PaymentType::withTrashed()->select([
            'id',
            'name',
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
            CacheKeysEnum::PREFIX_PAYMENT_TYPE->value,
            DB::table('payment_types')
                ->select(['id', 'name'])
                ->whereNull('deleted_at')
                ->orderBy('name')
        )->toArray();
    }
}
