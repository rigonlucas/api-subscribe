<?php

namespace App\Providers;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeReadInterface;
use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Admin\Domain\UseCases\PaymentType\CreatePaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\ListPaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\RestorePaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\UpdatePaymentTypeUseCase;
use App\Core\Admin\Infra\Respository\PaymentType\PaymentTypeRead;
use App\Core\Admin\Infra\Respository\PaymentType\PaymentTypeWrite;
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
    }

    /**
     * @return void
     */
    private function bindPaymentType(): void
    {
        $this->app->when(
            [CreatePaymentTypeUseCase::class, UpdatePaymentTypeUseCase::class, RestorePaymentTypeUseCase::class]
        )->needs(
            PaymentTypeWriteInterface::class
        )->give(
            PaymentTypeWrite::class
        );

        $this->app->when(
            [ListPaymentTypeUseCase::class]
        )->needs(
            PaymentTypeReadInterface::class
        )->give(
            PaymentTypeRead::class
        );
    }
}
