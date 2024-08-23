<?php

namespace App\Http\Controllers\Api\v1\DocumentControllers;

use App\Http\Resources\DocumentResources\GetDocumentAuthorResource;
use App\Http\Resources\DocumentResources\GetDocumentResource;
use App\UseCases\DocumentUseCases\GetAuthorByDocumentIdUseCase;
use App\UseCases\DocumentUseCases\GetHistoryByDocumentIdUseCase;
use Illuminate\Http\JsonResponse;

class GetHistoryByDocumentIdController
{
    protected GetHistoryByDocumentIdUseCase $documentService;
    public function __construct(GetHistoryByDocumentIdUseCase $documentService)
    {
        $this->documentService = $documentService;
    }

    public function getHistories($id): JsonResponse
    {
        $author = $this->documentService->execute($id);

        if($author):
            $author = new GetDocumentResource($author);
            return response()->json($author);
        else:
            return response()->json("No document with id=$id fund in histories!", 400);
        endif;
    }
}
