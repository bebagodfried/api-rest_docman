<?php

namespace App\Http\Controllers\Api\v1\HistoryControllers;

use App\Http\Controllers\Controller;
use App\UseCases\HistoryUseCases\GetHistoriesUseCase;
use Illuminate\Http\JsonResponse;

class GetHistoriesController extends Controller
{
    protected GetHistoriesUseCase $getHistoriesUseCase;
    public function __construct(GetHistoriesUseCase $getHistoriesUseCase)
    {
        $this->getHistoriesUseCase = $getHistoriesUseCase;
    }

    public function index(): JsonResponse
    {
        $histories = $this->getHistoriesUseCase->execute();

        if($histories):
            return response()->json($histories);
        else:
            return response()->json('Nothing here!', 204);
        endif;
    }
}
