<?php

namespace App\Core\Admin\Infra\Respository\PaymentValue;

use App\Core\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueReadInterface;
use App\Core\Admin\Infra\Enums\CacheKeysEnum;
use App\Core\Admin\Infra\Support\Cache\CacheManager;
use App\Core\Admin\Infra\Support\Pagination\Inputs\PaginationInput;
use App\Core\Admin\Infra\Support\Pagination\Inputs\PreparePagination;
use App\Models\PaymentValue;
use Illuminate\Support\Facades\DB;

class PaymentValueRead extends PreparePagination implements PaymentValueReadInterface
{
    use CacheManager;

    public function listPaginated(PaginationInput $paginationInput, ?string $name = null): array
    {
        $paymentValueModel = PaymentValue::query()->select([
            'id',
            'name',
            'value'
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
