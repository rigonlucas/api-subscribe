<?php

namespace App\Http\Controllers\Admin\Process;

use App\Core\Applications\Admin\Domain\Process\UseCases\Store\Input\StoreProcessInput;
use App\Core\Applications\Admin\Domain\Process\UseCases\Store\StoreProcessUseCase;
use App\Core\Applications\Admin\Domain\Process\UseCases\Update\Input\UpdateProcessInput;
use App\Core\Applications\Admin\Domain\Process\UseCases\Update\UpdateProcessUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Process\StoreProcessRequest;
use App\Http\Requests\Admin\Process\UpdateProcessRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProcessController extends Controller
{

    public function store (StoreProcessRequest $request): JsonResponse
    {
        $input = new StoreProcessInput(
            $request->input('name'),
            $request->input('description'),
            $request->input('tamb_link'),
            $request->input('active'),
            $request->input('public'),
            $request->input('process_type_id'),
            $request->input('start_at'),
            $request->input('finish_at')
        );
        /** @var StoreProcessUseCase $useCase */
        $useCase = app(StoreProcessUseCase::class);
        $output = $useCase->execute($input);
        return response()->json(['id' => $output->id], ResponseAlias::HTTP_CREATED);
    }

    public function update(UpdateProcessRequest $request, string $id): Response
    {
        $input = new UpdateProcessInput(
            $id,
            $request->input('name'),
            $request->input('description'),
            $request->input('tamb_link'),
            $request->input('active'),
            $request->input('public'),
            $request->input('process_type_id'),
            $request->input('start_at'),
            $request->input('finish_at')
        );
        /** @var UpdateProcessUseCase $useCase */
        $useCase = app(UpdateProcessUseCase::class);
        $useCase->execute($input);
        return response()->noContent();
    }
}
