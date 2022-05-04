<?php

use App\Http\Controllers\Payment\PaymentTypeController;
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

Route::get('type/payments-type/search', [PaymentTypeController::class, 'search'])
    ->name('payment.type.search');
Route::post('type/payments-type/store', [PaymentTypeController::class, 'store'])
    ->name('payment.type.store');
Route::put('type/payments-type/{id}/update', [PaymentTypeController::class, 'update'])
    ->name('payment.type.update');
Route::delete('type/payments-type/{id}/delete', [PaymentTypeController::class, 'delete'])
    ->name('payment.type.delete');
Route::put('type/payments-type/{id}/restore', [PaymentTypeController::class, 'restore'])
    ->name('payment.type.restore');
