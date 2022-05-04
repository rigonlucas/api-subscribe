<?php

namespace App\Providers;

use App\Core\Admin\Domain\Contracts\Repository\PaymentType\PaymentTypeWriteInterface;
use App\Core\Admin\Domain\UseCases\PaymentType\CreatePaymentTypeUseCase;
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
        $this->app->when(
            [CreatePaymentTypeUseCase::class]
        )->needs(
            PaymentTypeWriteInterface::class
        )->give(
            PaymentTypeWrite::class
        );
    }
}
