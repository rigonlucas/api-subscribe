<?php

namespace App\Providers;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeReadInterface;
use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueReadInterface;
use App\Core\Admin\Domain\Contracts\Repository\PaymentValue\PaymentValueWriteInterface;
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
use App\Core\Admin\Infra\Respository\PaymentType\PaymentTypeRead;
use App\Core\Admin\Infra\Respository\PaymentType\PaymentTypeWrite;
use App\Core\Admin\Infra\Respository\PaymentValue\PaymentValueRead;
use App\Core\Admin\Infra\Respository\PaymentValue\PaymentValueWrite;
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
}
