<?php

namespace App\Providers;

use App\Core\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupReadInterface;
use App\Core\Admin\Domain\Contracts\Repository\FieldGroup\FieldGroupWriteInterface;
use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeReadInterface;
use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueReadInterface;
use App\Core\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueWriteInterface;
use App\Core\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeReadInterface;
use App\Core\Admin\Domain\Contracts\Repository\ProcessType\ProcessTypeWriteInterface;

use App\Core\Admin\Domain\UseCases\FieldGroup\CreateFieldGroupUseCase;
use App\Core\Admin\Domain\UseCases\FieldGroup\DeleteFieldGroupUseCase;
use App\Core\Admin\Domain\UseCases\FieldGroup\ListFieldGroupUseCase;
use App\Core\Admin\Domain\UseCases\FieldGroup\ListFieldGroupWithCacheUseCase;
use App\Core\Admin\Domain\UseCases\FieldGroup\RestoreFieldGroupUseCase;
use App\Core\Admin\Domain\UseCases\FieldGroup\UpdateFieldGroupUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\CreatePaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\DeletePaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\ListPaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\ListPaymentTypeWithCacheUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\RestorePaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\UpdatePaymentTypeUseCase;

use App\Core\Admin\Domain\UseCases\PaymentValue\CreatePaymentValueUseCase;
use App\Core\Admin\Domain\UseCases\PaymentValue\DeletePaymentValueUseCase;
use App\Core\Admin\Domain\UseCases\PaymentValue\ListPaymentValueUseCase;
use App\Core\Admin\Domain\UseCases\PaymentValue\ListPaymentValueWithCacheUseCase;
use App\Core\Admin\Domain\UseCases\PaymentValue\RestorePaymentValueUseCase;
use App\Core\Admin\Domain\UseCases\PaymentValue\UpdatePaymentValueUseCase;

use App\Core\Admin\Domain\UseCases\ProcessType\CreateProcessTypeUseCase;
use App\Core\Admin\Domain\UseCases\ProcessType\DeleteProcessTypeUseCase;
use App\Core\Admin\Domain\UseCases\ProcessType\ListProcessTypeUseCase;
use App\Core\Admin\Domain\UseCases\ProcessType\ListProcessTypeWithCacheUseCase;
use App\Core\Admin\Domain\UseCases\ProcessType\RestoreProcessTypeUseCase;
use App\Core\Admin\Domain\UseCases\ProcessType\UpdateProcessTypeUseCase;

use App\Core\Admin\Infra\Respository\FieldGroup\FieldGroupRead;
use App\Core\Admin\Infra\Respository\FieldGroup\FieldGroupWrite;
use App\Core\Admin\Infra\Respository\PaymentType\PaymentTypeWrite;
use App\Core\Admin\Infra\Respository\PaymentValue\PaymentValueRead;
use App\Core\Admin\Infra\Respository\PaymentValue\PaymentValueWrite;

use App\Core\Admin\Infra\Respository\ProcessType\ProcessTypeRead;
use App\Core\Admin\Infra\Respository\ProcessType\ProcessTypeWrite;
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
            ProcessTypeRead::class
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
