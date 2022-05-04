<?php

namespace App\Http\Controllers\Payment;

use App\Core\Admin\Domain\UseCases\PaymentType\CreatePaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\DeletePaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\DeletePaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\RestorePaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\CreatePaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\RestorePaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\UpdatePaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\UpdatePaymentTypeUseCase;
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


    public function update(Request $request, string $id)
    {
        $input = new UpdatePaymentTypeInput(
            $id,
            $request->input('name', ''),
        );

        /** @var UpdatePaymentTypeUseCase $useCase */
        $useCase = app(UpdatePaymentTypeUseCase::class);
        $useCase->execute($input);

        return response()->noContent();
    }


    public function delete(string $id)
    {
        $input = new DeletePaymentTypeInput(
            $id,
        );

        /** @var DeletePaymentTypeUseCase $useCase */
        $useCase = app(DeletePaymentTypeUseCase::class);
        $useCase->execute($input);

        return response()->noContent();
    }


    public function restore(string $id)
    {
        $input = new RestorePaymentTypeInput(
            $id,
        );

        /** @var RestorePaymentTypeUseCase $useCase */
        $useCase = app(RestorePaymentTypeUseCase::class);
        $output = $useCase->execute($input);

        return response()->json(['id' => $output->id]);
    }
}
