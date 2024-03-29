<?php

use App\Http\Controllers\Admin\Field\FieldGroupsController;
use App\Http\Controllers\Admin\Payment\PaymentTypeController;
use App\Http\Controllers\Admin\Payment\PaymentValueController;
use App\Http\Controllers\Admin\Process\ProcessController;
use App\Http\Controllers\Admin\Process\ProcessTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::domain('api.subscribe.admin.'.env('APP_URL'))
    ->name('admin.')
    ->group(function () {
        Route::prefix('type')
            ->name('type.')
            ->group(function () {
                Route::get('payments-type/', [PaymentTypeController::class, 'index'])
                    ->name('payment-type.index');
                Route::get('payments-type/search', [PaymentTypeController::class, 'search'])
                    ->name('payment-type.search');
                Route::post('payments-type/store', [PaymentTypeController::class, 'store'])
                    ->name('payment-type.store');
                Route::put('payments-type/{id}/update', [PaymentTypeController::class, 'update'])
                    ->name('payment-type.update');
                Route::delete('payments-type/{id}/delete', [PaymentTypeController::class, 'delete'])
                    ->name('payment-type.delete');
                Route::patch('payments-type/{id}/restore', [PaymentTypeController::class, 'restore'])
                    ->name('payment-type.restore');


                Route::get('payments-value/', [PaymentValueController::class, 'index'])
                    ->name('payment-value.index');
                Route::get('payments-value/search', [PaymentValueController::class, 'search'])
                    ->name('payment-value.search');
                Route::post('payments-value/store', [PaymentValueController::class, 'store'])
                    ->name('payment-value.store');
                Route::put('payments-value/{id}/update', [PaymentValueController::class, 'update'])
                    ->name('payment-value.update');
                Route::delete('payments-value/{id}/delete', [PaymentValueController::class, 'delete'])
                    ->name('payment-value.delete');
                Route::patch('payments-value/{id}/restore', [PaymentValueController::class, 'restore'])
                    ->name('payment-value.restore');


                Route::get('process-type/', [ProcessTypeController::class, 'index'])
                    ->name('process-type.index');
                Route::get('process-type/search', [ProcessTypeController::class, 'search'])
                    ->name('process-type.search');
                Route::post('process-type/store', [ProcessTypeController::class, 'store'])
                    ->name('process-type.store');
                Route::put('process-type/{id}/update', [ProcessTypeController::class, 'update'])
                    ->name('process-type.update');
                Route::delete('process-type/{id}/delete', [ProcessTypeController::class, 'delete'])
                    ->name('process-type.delete');
                Route::patch('process-type/{id}/restore', [ProcessTypeController::class, 'restore'])
                    ->name('process-type.restore');

                Route::get('field-group/', [FieldGroupsController::class, 'index'])
                    ->name('field-group.index');
                Route::get('field-group/search', [FieldGroupsController::class, 'search'])
                    ->name('field-group.search');
                Route::post('field-group/store', [FieldGroupsController::class, 'store'])
                    ->name('field-group.store');
                Route::put('field-group/{id}/update', [FieldGroupsController::class, 'update'])
                    ->name('field-group.update');
                Route::delete('field-group/{id}/delete', [FieldGroupsController::class, 'delete'])
                    ->name('field-group.delete');
                Route::patch('field-group/{id}/restore', [FieldGroupsController::class, 'restore'])
                    ->name('field-group.restore');
        });

        Route::prefix('process')
            ->name('process.')
            ->group(function (){
                Route::post('store', [ProcessController::class, 'store'])->name('store');
                Route::put('{id}/update', [ProcessController::class, 'update'])->name('update');
                Route::delete('{id}/delete', [ProcessController::class, 'delete'])->name('delete');
                Route::patch('{id}/restore', [ProcessController::class, 'restore'])->name('restore');
        });
});
