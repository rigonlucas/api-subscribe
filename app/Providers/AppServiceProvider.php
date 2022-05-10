<?php

namespace App\Providers;

use App\Core\Applications\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupReadInterface;
use App\Core\Applications\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupWriteInterface;
use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeReadInterface;
use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueReadInterface;
use App\Core\Applications\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueWriteInterface;
use App\Core\Applications\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeReadInterface;
use App\Core\Applications\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeWriteInterface;
use App\Core\Applications\Admin\Domain\UseCases\FieldGroup\CreateFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\UseCases\FieldGroup\DeleteFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\UseCases\FieldGroup\ListFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\UseCases\FieldGroup\ListFieldGroupWithCacheUseCase;
use App\Core\Applications\Admin\Domain\UseCases\FieldGroup\RestoreFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\UseCases\FieldGroup\UpdateFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\CreatePaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\DeletePaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\ListPaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\ListPaymentTypeWithCacheUseCase;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\RestorePaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\UseCases\PaymentType\UpdatePaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\UseCases\PaymentValue\CreatePaymentValueUseCase;
use App\Core\Applications\Admin\Domain\UseCases\PaymentValue\DeletePaymentValueUseCase;
use App\Core\Applications\Admin\Domain\UseCases\PaymentValue\ListPaymentValueUseCase;
use App\Core\Applications\Admin\Domain\UseCases\PaymentValue\ListPaymentValueWithCacheUseCase;
use App\Core\Applications\Admin\Domain\UseCases\PaymentValue\RestorePaymentValueUseCase;
use App\Core\Applications\Admin\Domain\UseCases\PaymentValue\UpdatePaymentValueUseCase;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\CreateProcessTypeUseCase;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\DeleteProcessTypeUseCase;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\ListProcessTypeUseCase;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\ListProcessTypeWithCacheUseCase;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\RestoreProcessTypeUseCase;
use App\Core\Applications\Admin\Domain\UseCases\ProcessType\UpdateProcessTypeUseCase;
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
            [ListPaymentTypeUseCase::class, ListPaymentTypeWithCacheUseCase::class]
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
            [ListPaymentValueUseCase::class, ListPaymentValueWithCacheUseCase::class]
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
            [ListProcessTypeUseCase::class, ListProcessTypeWithCacheUseCase::class]
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
            [ListFieldGroupUseCase::class, ListFieldGroupWithCacheUseCase::class]
        )->needs(
            FieldGroupReadInterface::class
        )->give(
            FieldGroupRead::class
        );
    }
}
