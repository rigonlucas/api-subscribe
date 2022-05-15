<?php

namespace App\Http\Controllers\Process;

use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete\DeleteProcessTypeUseCase;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Delete\Input\DeleteProcessTypeInput;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\ListCached\ListProcessTypeWithCacheUseCase;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\ListPaginated\Input\ListProcessTypeInput;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\ListPaginated\ListProcessTypeUseCase;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Restore\Input\RestoreProcessTypeInput;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Restore\RestoreProcessTypeUseCase;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\StoreProcessTypeUseCase;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Store\Input\StoreProcessTypeInput;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Update\Input\UpdateProcessTypeInput;
use App\Core\Applications\Admin\Domain\ProcessType\UseCases\Update\UpdateProcessTypeUseCase;
use App\Core\Support\Pagination\Inputs\PaginationInput;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProcessTypeController extends Controller
{
    public function index()
    {
        /** @var ListProcessTypeWithCacheUseCase $useCase */
        $useCase = app(ListProcessTypeWithCacheUseCase::class);
        $output = $useCase->execute();

        return response()->json($output->data);
    }

    public function search(Request $request): JsonResponse
    {
        $input = new ListProcessTypeInput($request->input('name', null));

        $paginationInput = new PaginationInput(
            $request->input('page'),
            $request->input('per_page')
        );

        /** @var ListProcessTypeUseCase $useCase */
        $useCase = app(ListProcessTypeUseCase::class);
        $output = $useCase->execute($input, $paginationInput);

        return response()->json([$output->build()]);
    }

    public function store(Request $request): JsonResponse
    {
        $input = new StoreProcessTypeInput(
            $request->input('name', ''),
            $request->input('description', '')
        );

        /** @var StoreProcessTypeUseCase $useCase */
        $useCase = app(StoreProcessTypeUseCase::class);
        $output = $useCase->execute($input);

        return response()->json(['id' => $output->id], ResponseAlias::HTTP_CREATED);
    }

    public function update(Request $request, string $id): Response
    {
        $input = new UpdateProcessTypeInput(
            $id,
            $request->input('name', ''),
            $request->input('description', '')
        );

        /** @var UpdateProcessTypeUseCase $useCase */
        $useCase = app(UpdateProcessTypeUseCase::class);
        $useCase->execute($input);

        return response()->noContent();
    }

    public function delete(string $id): Response
    {
        $input = new DeleteProcessTypeInput(
            $id,
        );

        /** @var DeleteProcessTypeUseCase $useCase */
        $useCase = app(DeleteProcessTypeUseCase::class);
        $useCase->execute($input);

        return response()->noContent();
    }

    public function restore(string $id): JsonResponse
    {
        $input = new RestoreProcessTypeInput(
            $id,
        );

        /** @var RestoreProcessTypeUseCase $useCase */
        $useCase = app(RestoreProcessTypeUseCase::class);
        $output = $useCase->execute($input);

        return response()->json(['id' => $output->id]);
    }
}
