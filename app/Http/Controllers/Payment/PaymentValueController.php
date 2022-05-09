<?php

namespace App\Http\Controllers\Payment;

use App\Core\Admin\Domain\UseCases\PaymentValue\CreatePaymentValueUseCase;
use App\Core\Admin\Domain\UseCases\PaymentValue\DeletePaymentValueUseCase;
use App\Core\Admin\Domain\UseCases\PaymentValue\Inputs\CreatePaymentValueInput;
use App\Core\Admin\Domain\UseCases\PaymentValue\Inputs\DeletePaymentValueInput;
use App\Core\Admin\Domain\UseCases\PaymentValue\Inputs\ListPaymentValueInput;
use App\Core\Admin\Domain\UseCases\PaymentValue\Inputs\RestorePaymentValueInput;
use App\Core\Admin\Domain\UseCases\PaymentValue\Inputs\UpdatePaymentValueInput;
use App\Core\Admin\Domain\UseCases\PaymentValue\ListPaymentValueUseCase;
use App\Core\Admin\Domain\UseCases\PaymentValue\ListPaymentValueWithCacheUseCase;
use App\Core\Admin\Domain\UseCases\PaymentValue\RestorePaymentValueUseCase;
use App\Core\Admin\Domain\UseCases\PaymentValue\UpdatePaymentValueUseCase;
use App\Core\Admin\Infra\Support\Pagination\Inputs\PaginationInput;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentValueController extends Controller
{
    public function index()
    {
        /** @var ListPaymentValueWithCacheUseCase $useCase */
        $useCase = app(ListPaymentValueWithCacheUseCase::class);
        $output = $useCase->execute();

        return response()->json($output->data);
    }

    public function search(Request $request): JsonResponse
    {
        $input = new ListPaymentValueInput($request->input('name', null));

        $paginationInput = new PaginationInput(
            $request->input('page'),
            $request->input('per_page')
        );

        /** @var ListPaymentValueUseCase $useCase */
        $useCase = app(ListPaymentValueUseCase::class);
        $output = $useCase->execute($input, $paginationInput);

        return response()->json([$output->build()]);
    }

    public function store(Request $request): JsonResponse
    {
        $input = new CreatePaymentValueInput(
            $request->input('name', ''),
            (float) $request->input('value', '')
        );

        /** @var CreatePaymentValueUseCase $useCase */
        $useCase = app(CreatePaymentValueUseCase::class);
        $output = $useCase->execute($input);

        return response()->json(['id' => $output->id]);
    }

    public function update(Request $request, string $id): Response
    {
        $input = new UpdatePaymentValueInput(
            $id,
            $request->input('name', ''),
            $request->input('value', ''),
        );

        /** @var UpdatePaymentValueUseCase $useCase */
        $useCase = app(UpdatePaymentValueUseCase::class);
        $useCase->execute($input);

        return response()->noContent();
    }

    public function delete(string $id): Response
    {
        $input = new DeletePaymentValueInput(
            $id,
        );

        /** @var DeletePaymentValueUseCase $useCase */
        $useCase = app(DeletePaymentValueUseCase::class);
        $useCase->execute($input);

        return response()->noContent();
    }

    public function restore(string $id): JsonResponse
    {
        $input = new RestorePaymentValueInput(
            $id,
        );

        /** @var RestorePaymentValueUseCase $useCase */
        $useCase = app(RestorePaymentValueUseCase::class);
        $output = $useCase->execute($input);

        return response()->json(['id' => $output->id]);
    }
}
