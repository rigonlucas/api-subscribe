<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Delete\DeletePaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Delete\Input\DeletePaymentTypeInput;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\ListCached\ListPaymentTypeWithCacheUseCase;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\ListPaginated\Input\ListPaymentTypeInput;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\ListPaginated\ListPaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Restore\Input\RestorePaymentTypeInput;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Restore\RestorePaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\Input\StorePaymentTypeInput;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Store\StorePaymentTypeUseCase;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Update\Input\UpdatePaymentTypeInput;
use App\Core\Applications\Admin\Domain\PaymentType\UseCases\Update\UpdatePaymentTypeUseCase;
use App\Core\Support\Pagination\Inputs\PaginationInput;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use function app;
use function response;

class PaymentTypeController extends Controller
{
    public function index()
    {
        /** @var ListPaymentTypeWithCacheUseCase $useCase */
        $useCase = app(ListPaymentTypeWithCacheUseCase::class);
        $output = $useCase->execute();

        return response()->json($output->data);
    }

    public function search(Request $request): JsonResponse
    {
        $input = new ListPaymentTypeInput($request->input('name', null));

        $paginationInput = new PaginationInput(
            $request->input('page'),
            $request->input('per_page')
        );

        /** @var ListPaymentTypeUseCase $useCase */
        $useCase = app(ListPaymentTypeUseCase::class);
        $output = $useCase->execute($input, $paginationInput);

        return response()->json([$output->build()]);
    }

    public function store(Request $request): JsonResponse
    {
        $input = new StorePaymentTypeInput($request->input('name', ''));

        /** @var StorePaymentTypeUseCase $useCase */
        $useCase = app(StorePaymentTypeUseCase::class);
        $output = $useCase->execute($input);

        return response()->json(['id' => $output->id]);
    }

    public function update(Request $request, string $id): Response
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

    public function delete(string $id): Response
    {
        $input = new DeletePaymentTypeInput(
            $id,
        );

        /** @var DeletePaymentTypeUseCase $useCase */
        $useCase = app(DeletePaymentTypeUseCase::class);
        $useCase->execute($input);

        return response()->noContent();
    }

    public function restore(string $id): JsonResponse
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
