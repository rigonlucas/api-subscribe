<?php

namespace App\Http\Controllers\Payment;

use App\Core\Admin\Domain\UseCases\PaymentType\CreatePaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\CreatePaymentTypeInput;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function store(Request $request)
    {
        $input = new CreatePaymentTypeInput($request->input('name', ''));

        /** @var CreatePaymentTypeUseCase $useCase */
        $useCase = app(CreatePaymentTypeUseCase::class);
        $output = $useCase->execute($input);

        return response()->json([$output->id], 201);
    }
}
