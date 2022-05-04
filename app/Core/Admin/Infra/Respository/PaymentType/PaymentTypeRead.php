<?php

namespace App\Core\Admin\Infra\Respository\PaymentType;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeReadInterface;
use App\Core\Admin\Infra\Support\Pagination\PaginationInput;
use App\Core\Admin\Infra\Support\Pagination\PreparePagination;
use App\Models\PaymentType;

class PaymentTypeRead extends PreparePagination implements PaymentTypeReadInterface
{

    public function listAll(PaginationInput $paginationInput, ?string $name = null): array
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
}
