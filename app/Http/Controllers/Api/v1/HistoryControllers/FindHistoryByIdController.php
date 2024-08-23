<?php

namespace App\Http\Controllers\Api\v1\HistoryControllers;

use App\Http\Controllers\Controller;
use App\UseCases\HistoryUseCases\FindHistoryByIdUseCase;
use Illuminate\Http\JsonResponse;

class FindHistoryByIdController extends Controller
{
    protected FindHistoryByIdUseCase $historyService;
    public function __construct(FindHistoryByIdUseCase $historyService)
    {
        $this->historyService = $historyService;
    }

    public function show($id): JsonResponse
    {
        $history = $this->historyService->execute($id);

        if($history):
            return response()->json($history);
        else:
            return response()->json("No history with id=$id here!", 404);
        endif;
    }
}
