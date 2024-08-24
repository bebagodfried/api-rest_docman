<?php

namespace App\Http\Controllers\Api\v1\HistoryControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HistoryResources\GetHistoryResource;
use App\UseCases\HistoryUseCases\GetHistoryByDocumentIdUseCase;
use Illuminate\Http\JsonResponse;

class GetHistoryByDocumentIdController extends Controller
{
    protected GetHistoryByDocumentIdUseCase $getHistoryByDocumentIdUseCase;
    public function __construct(GetHistoryByDocumentIdUseCase $getHistoryByDocumentIdUseCase)
    {
        $this->getHistoryByDocumentIdUseCase = $getHistoryByDocumentIdUseCase;
    }

    public function getHistories($id): JsonResponse
    {
        $historises = $this->getHistoryByDocumentIdUseCase->execute($id);

        if($historises->count() >> 0):
            $historises = GetHistoryResource::collection($historises);
            return response()->json($historises);
        else:
            return response()->json("Histories or document bad request, please check and try again", 400);
        endif;
    }
}
