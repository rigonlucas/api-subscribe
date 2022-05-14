<?php

namespace App\Providers;

use App\Core\Applications\Admin\Domain\FieldGroup\Contracts\Repository\FieldGroupReadInterface;
use App\Core\Applications\Admin\Domain\FieldGroup\Contracts\Repository\FieldGroupWriteInterface;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\DeleteFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\ListCached\ListFieldGroupWithCacheUseCase;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\ListPaginated\ListFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Restore\RestoreFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store\CreateFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Update\UpdateFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository\PaymentTypeReadInterface;
use App\Core\Applications\Admin\Domain\PaymentType\Contracts\Repository\PaymentTypeWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Delete\DeletePaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\ListCached\ListPaymentTypeWithCacheUseCase;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\ListPaginated\ListPaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Restore\RestorePaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\CreatePaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Update\UpdatePaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\PaymentValue\Contracts\Repository\PaymentValueReadInterface;
use App\Core\Applications\Admin\Domain\PaymentValue\Contracts\Repository\PaymentValueWriteInterface;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\DeletePaymentValueUseCase;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\ListCached\ListPaymentValueWithCacheUseCase;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\ListPaginated\ListPaymentValueUseCase;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Restore\RestorePaymentValueUseCase;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\CreatePaymentValueUseCase;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Update\UpdatePaymentValueUseCase;
use App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository\ProcessTypeReadInterface;
use App\Core\Applications\Admin\Domain\ProcessType\Contracts\Repository\ProcessTypeWriteInterface;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete\DeleteProcessTypeUseCase;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\ListCached\ListProcessTypeWithCacheUseCase;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\ListPaginated\ListProcessTypeUseCase;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Restore\RestoreProcessTypeUseCase;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\CreateProcessTypeUseCase;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Update\UpdateProcessTypeUseCase;
use App\Core\Applications\Admin\Infra\Respository\FieldGroup\FieldGroupRead;
use App\Core\Applications\Admin\Infra\Respository\FieldGroup\FieldGroupWrite;
use App\Core\Applications\Admin\Infra\Respository\PaymentType\PaymentTypeRead;
use App\Core\Applications\Admin\Infra\Respository\PaymentType\PaymentTypeWrite;
use App\Core\Applications\Admin\Infra\Respository\PaymentValue\PaymentValueRead;
use App\Core\Applications\Admin\Infra\Respository\PaymentValue\PaymentValueWrite;
use App\Core\Applications\Admin\Infra\Respository\ProcessType\ProcessTypeRead;
use App\Core\Applications\Admin\Infra\Respository\ProcessType\ProcessTypeWrite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bindPaymentType();
        $this->bindPaymentValue();
        $this->bindProcessType();
        $this->bindFieldGroup();
    }

    private function bindPaymentType(): void
    {
        $this->app->when(
            [
                CreatePaymentTypeUseCase::class,
                UpdatePaymentTypeUseCase::class,
                RestorePaymentTypeUseCase::class,
                DeletePaymentTypeUseCase::class
            ]
        )->needs(
            PaymentTypeWriteInterface::class
        )->give(
            PaymentTypeWrite::class
        );

        $this->app->when(
            [
                ListPaymentTypeUseCase::class,
                ListPaymentTypeWithCacheUseCase::class
            ]
        )->needs(
            PaymentTypeReadInterface::class
        )->give(
            PaymentTypeRead::class
        );
    }
    private function bindPaymentValue(): void
    {
        $this->app->when(
            [
                CreatePaymentValueUseCase::class,
                UpdatePaymentValueUseCase::class,
                RestorePaymentValueUseCase::class,
                DeletePaymentValueUseCase::class
            ]
        )->needs(
            PaymentValueWriteInterface::class
        )->give(
            PaymentValueWrite::class
        );

        $this->app->when(
            [
                ListPaymentValueUseCase::class,
                ListPaymentValueWithCacheUseCase::class
            ]
        )->needs(
            PaymentValueReadInterface::class
        )->give(
            PaymentValueRead::class
        );
    }
    private function bindProcessType(): void
    {
        $this->app->when(
            [
                CreateProcessTypeUseCase::class,
                UpdateProcessTypeUseCase::class,
                RestoreProcessTypeUseCase::class,
                DeleteProcessTypeUseCase::class
            ]
        )->needs(
            ProcessTypeWriteInterface::class
        )->give(
            ProcessTypeWrite::class
        );

        $this->app->when(
            [
                ListProcessTypeUseCase::class,
                ListProcessTypeWithCacheUseCase::class
            ]
        )->needs(
            ProcessTypeReadInterface::class
        )->give(
            ProcessTypeRead::class
        );
    }
    private function bindFieldGroup(): void
    {
        $this->app->when(
            [
                CreateFieldGroupUseCase::class,
                UpdateFieldGroupUseCase::class,
                RestoreFieldGroupUseCase::class,
                DeleteFieldGroupUseCase::class
            ]
        )->needs(
            FieldGroupWriteInterface::class
        )->give(
            FieldGroupWrite::class
        );

        $this->app->when(
            [
                ListFieldGroupUseCase::class,
                ListFieldGroupWithCacheUseCase::class
            ]
        )->needs(
            FieldGroupReadInterface::class
        )->give(
            FieldGroupRead::class
        );
    }
}
