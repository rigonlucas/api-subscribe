<?php

use App\Http\Controllers\Payment\PaymentTypeController;
use App\Http\Controllers\Payment\PaymentValueController;
use Illuminate\Http\Request;
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
        ->name('payment.type.index');
    Route::get('payments-type/search', [PaymentTypeController::class, 'search'])
        ->name('payment.type.search');
    Route::post('payments-type/store', [PaymentTypeController::class, 'store'])
        ->name('payment.type.store');
    Route::put('payments-type/{id}/update', [PaymentTypeController::class, 'update'])
        ->name('payment.type.update');
    Route::delete('payments-type/{id}/delete', [PaymentTypeController::class, 'delete'])
        ->name('payment.type.delete');
    Route::put('payments-type/{id}/restore', [PaymentTypeController::class, 'restore'])
        ->name('payment.type.restore');


    Route::get('payments-value/', [PaymentValueController::class, 'index'])
        ->name('payment.value.index');
    Route::get('payments-value/search', [PaymentValueController::class, 'search'])
        ->name('payment.value.search');
    Route::post('payments-value/store', [PaymentValueController::class, 'store'])
        ->name('payment.value.store');
    Route::put('payments-value/{id}/update', [PaymentValueController::class, 'update'])
        ->name('payment.value.update');
    Route::delete('payments-value/{id}/delete', [PaymentValueController::class, 'delete'])
        ->name('payment.value.delete');
    Route::put('payments-value/{id}/restore', [PaymentValueController::class, 'restore'])
        ->name('payment.value.restore');
});
