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

Route::post('type/payments/values/', [PaymentTypeController::class, 'store'])->name('payment.type.store');
Route::put('type/payments/values/{id}', [PaymentTypeController::class, 'update'])->name('payment.type.update');
