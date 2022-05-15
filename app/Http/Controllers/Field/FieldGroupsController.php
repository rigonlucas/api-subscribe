<?php

namespace App\Http\Controllers\Field;

use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\DeleteFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Delete\Input\DeleteFieldGroupInput;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\ListCached\ListFieldGroupWithCacheUseCase;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\ListPaginated\Input\ListFieldGroupInput;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\ListPaginated\ListFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Restore\Input\RestoreFieldGroupInput;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Restore\RestoreFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store\StoreFieldGroupUseCase;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Store\Input\CreateFieldGroupInput;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Update\Input\UpdateFieldGroupInput;
use App\Core\Applications\Admin\Domain\FieldGroup\UseCases\Update\UpdateFieldGroupUseCase;
use App\Core\Support\Pagination\Inputs\PaginationInput;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FieldGroupsController extends Controller
{
    public function index()
    {
        /** @var ListFieldGroupWithCacheUseCase $useCase */
        $useCase = app(ListFieldGroupWithCacheUseCase::class);
        $output = $useCase->execute();

        return response()->json($output->data);
    }

    public function search(Request $request): JsonResponse
    {
        $input = new ListFieldGroupInput($request->input('name', null));

        $paginationInput = new PaginationInput(
            $request->input('page'),
            $request->input('per_page')
        );

        /** @var ListFieldGroupUseCase $useCase */
        $useCase = app(ListFieldGroupUseCase::class);
        $output = $useCase->execute($input, $paginationInput);

        return response()->json([$output->build()]);
    }

    public function store(Request $request): JsonResponse
    {
        $input = new CreateFieldGroupInput(
            $request->input('name', ''),
            $request->input('description', '')
        );

        /** @var StoreFieldGroupUseCase $useCase */
        $useCase = app(StoreFieldGroupUseCase::class);
        $output = $useCase->execute($input);

        return response()->json(['id' => $output->id]);
    }

    public function update(Request $request, string $id): Response
    {
        $input = new UpdateFieldGroupInput(
            $id,
            $request->input('name', ''),
            $request->input('description', '')
        );

        /** @var UpdateFieldGroupUseCase $useCase */
        $useCase = app(UpdateFieldGroupUseCase::class);
        $useCase->execute($input);

        return response()->noContent();
    }

    public function delete(string $id): Response
    {
        $input = new DeleteFieldGroupInput(
            $id,
        );

        /** @var DeleteFieldGroupUseCase $useCase */
        $useCase = app(DeleteFieldGroupUseCase::class);
        $useCase->execute($input);

        return response()->noContent();
    }

    public function restore(string $id): JsonResponse
    {
        $input = new RestoreFieldGroupInput(
            $id,
        );

        /** @var RestoreFieldGroupUseCase $useCase */
        $useCase = app(RestoreFieldGroupUseCase::class);
        $output = $useCase->execute($input);

        return response()->json(['id' => $output->id]);
    }
}
