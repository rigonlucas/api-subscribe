<?php

namespace App\Core\Applications\Admin\Infra\Respository\PaymentValue;

use App\Core\Applications\Admin\Domain\PaymentValue\Contracts\Repository\PaymentValueReadInterface;
use App\Core\Applications\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Support\Cache\CacheManager;
use App\Core\Support\Pagination\Inputs\PaginationInput;
use App\Core\Support\Pagination\Inputs\PreparePagination;
use App\Models\PaymentValue;
use Illuminate\Support\Facades\DB;

class PaymentValueRead extends PreparePagination implements PaymentValueReadInterface
{
    use CacheManager;

    public function listPaginated(PaginationInput $paginationInput, ?string $name = null): array
    {
        $paymentValueModel = PaymentValue::withTrashed()->select([
            'id',
            'name',
            'value',
            'created_at',
            'deleted_at'
        ]);
        $paymentValueModel->when(
            $name,
            fn($query) => $query->where('name', 'like', '%'.$name.'%')
        );

        return $this->preparePagination(
            $paymentValueModel->paginate(
                $paginationInput->getPerPage()
            )->toArray()
        );
    }

    public function listAllCached(): array
    {
        return $this->createCache(
            CacheKeysEnum::PREFIX_PAYMENT_VALUE->value,
            DB::table('payment_values')
                ->select(['id', 'name', 'value'])
                ->whereNull('deleted_at')
                ->orderBy('name')
        )->toArray();
    }
}
