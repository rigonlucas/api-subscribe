<?php

namespace App\Http\Controllers\Payment;

use App\Core\Admin\Domain\UseCases\PaymentType\CreatePaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\DeletePaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\CreatePaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\DeletePaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\ListPaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\RestorePaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\Inputs\UpdatePaymentTypeInput;
use App\Core\Admin\Domain\UseCases\PaymentType\ListPaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\ListPaymentTypeWithCacheUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\RestorePaymentTypeUseCase;
use App\Core\Admin\Domain\UseCases\PaymentType\UpdatePaymentTypeUseCase;
use App\Core\Admin\Infra\Support\Pagination\Inputs\PaginationInput;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $input = new CreatePaymentTypeInput($request->input('name', ''));

        /** @var CreatePaymentTypeUseCase $useCase */
        $useCase = app(CreatePaymentTypeUseCase::class);
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
