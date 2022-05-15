<?php

namespace App\Http\Controllers\Process;

use App\Core\Applications\Admin\Domain\Process\UseCases\Store\Input\StoreProcessInput;
use App\Core\Applications\Admin\Domain\Process\UseCases\Store\StoreProcessUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProcessController extends Controller
{

    public function store (Request $request): JsonResponse
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
}
