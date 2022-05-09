<?php

namespace App\Core\Admin\Infra\Respository\ProcessType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeReadInterface;
use App\Core\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Admin\Infra\Support\Cache\CacheManager;
use App\Core\Admin\Infra\Support\Pagination\Inputs\PaginationInput;
use App\Core\Admin\Infra\Support\Pagination\Inputs\PreparePagination;
use App\Models\PaymentType;
use Illuminate\Support\Facades\DB;

class ProcessTypeRead extends PreparePagination implements PaymentTypeReadInterface
{
    use CacheManager;

    public function listPaginated(PaginationInput $paginationInput, ?string $name = null): array
    {
        $paymentTypeModel = PaymentType::query()->select([
            'id',
            'name'
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
