<?php

use App\Http\Controllers\Field\FieldGroupsController;
use App\Http\Controllers\Payment\PaymentTypeController;
use App\Http\Controllers\Payment\PaymentValueController;
use App\Http\Controllers\Process\ProcessTypeController;
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
Route::prefix('type')->group(function () {
    Route::get('payments-type/', [PaymentTypeController::class, 'index'])
        ->name('payment-type.type.index');
    Route::get('payments-type/search', [PaymentTypeController::class, 'search'])
        ->name('payment-type.type.search');
    Route::post('payments-type/store', [PaymentTypeController::class, 'store'])
        ->name('payment-type.type.store');
    Route::put('payments-type/{id}/update', [PaymentTypeController::class, 'update'])
        ->name('payment-type.type.update');
    Route::delete('payments-type/{id}/delete', [PaymentTypeController::class, 'delete'])
        ->name('payment-type.type.delete');
    Route::put('payments-type/{id}/restore', [PaymentTypeController::class, 'restore'])
        ->name('payment-type.type.restore');


    Route::get('payments-value/', [PaymentValueController::class, 'index'])
        ->name('payment-value.type.index');
    Route::get('payments-value/search', [PaymentValueController::class, 'search'])
        ->name('payment-value.type.search');
    Route::post('payments-value/store', [PaymentValueController::class, 'store'])
        ->name('payment-value.type.store');
    Route::put('payments-value/{id}/update', [PaymentValueController::class, 'update'])
        ->name('payment-value.type.update');
    Route::delete('payments-value/{id}/delete', [PaymentValueController::class, 'delete'])
        ->name('payment-value.type.delete');
    Route::put('payments-value/{id}/restore', [PaymentValueController::class, 'restore'])
        ->name('payment-value.type.restore');


    Route::get('process-type/', [ProcessTypeController::class, 'index'])
        ->name('process-type.type.index');
    Route::get('process-type/search', [ProcessTypeController::class, 'search'])
        ->name('process-type.type.search');
    Route::post('process-type/store', [ProcessTypeController::class, 'store'])
        ->name('process-type.type.store');
    Route::put('process-type/{id}/update', [ProcessTypeController::class, 'update'])
        ->name('process-type.type.update');
    Route::delete('process-type/{id}/delete', [ProcessTypeController::class, 'delete'])
        ->name('process-type.type.delete');
    Route::put('process-type/{id}/restore', [ProcessTypeController::class, 'restore'])
        ->name('process-type.type.restore');

    Route::get('field-group/', [FieldGroupsController::class, 'index'])
        ->name('field-group.type.index');
    Route::get('field-group/search', [FieldGroupsController::class, 'search'])
        ->name('field-group.type.search');
    Route::post('field-group/store', [FieldGroupsController::class, 'store'])
        ->name('field-group.type.store');
    Route::put('field-group/{id}/update', [FieldGroupsController::class, 'update'])
        ->name('field-group.type.update');
    Route::delete('field-group/{id}/delete', [FieldGroupsController::class, 'delete'])
        ->name('field-group.type.delete');
    Route::put('field-group/{id}/restore', [FieldGroupsController::class, 'restore'])
        ->name('field-group.type.restore');
});
