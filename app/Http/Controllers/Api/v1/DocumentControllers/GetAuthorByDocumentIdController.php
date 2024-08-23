<?php

namespace App\Http\Controllers\Api\v1\DocumentControllers;

use App\Http\Resources\DocumentResources\GetDocumentAuthorResource;
use App\UseCases\DocumentUseCases\GetAuthorByDocumentIdUseCase;
use Illuminate\Http\JsonResponse;

class GetAuthorByDocumentIdController
{
    protected GetAuthorByDocumentIdUseCase $documentService;
    public function __construct(GetAuthorByDocumentIdUseCase $documentService)
    {
        $this->documentService = $documentService;
    }

    public function getAuthor($id): JsonResponse
    {
        $author = $this->documentService->execute($id);

        if($author):
            $author = new GetDocumentAuthorResource($author);
            return response()->json($author);
        else:
            return response()->json("No document with id=$id here!", 400);
        endif;
    }
}
