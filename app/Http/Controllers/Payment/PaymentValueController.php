<?php

namespace App\Http\Controllers\Payment;

use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\DeletePaymentValueUseCase;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Delete\Input\DeletePaymentValueInput;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\ListCached\ListPaymentValueWithCacheUseCase;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\ListPaginated\Input\ListPaymentValueInput;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\ListPaginated\ListPaymentValueUseCase;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Restore\Input\RestorePaymentValueInput;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Restore\RestorePaymentValueUseCase;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\StorePaymentValueUseCase;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Store\Input\StorePaymentValueInput;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Update\Input\UpdatePaymentValueInput;
use App\Core\Applications\Admin\Domain\PaymentValue\UseCases\Update\UpdatePaymentValueUseCase;
use App\Core\Support\Pagination\Inputs\PaginationInput;
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
        $input = new StorePaymentValueInput(
            $request->input('name', ''),
            (float) $request->input('value', '')
        );

        /** @var StorePaymentValueUseCase $useCase */
        $useCase = app(StorePaymentValueUseCase::class);
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
