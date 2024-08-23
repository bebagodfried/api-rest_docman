<?php

namespace App\Http\Controllers\Api\v1\DocumentControllers;

use App\Http\Resources\DocumentResources\GetArchivedDocumentResource;
use App\UseCases\DocumentUseCases\GetArchivedDocumentsUseCase;
use Illuminate\Http\JsonResponse;

class GetArchivedDocumentsController
{
    protected GetArchivedDocumentsUseCase $documentService;
    public function __construct(GetArchivedDocumentsUseCase $documentService)
    {
        $this->documentService = $documentService;
    }

    public function getArchived(): JsonResponse
    {
        $getArchivedDocuments = $this->documentService->execute();

        if($getArchivedDocuments):
            $getArchivedDocuments = GetArchivedDocumentResource::collection($getArchivedDocuments);
            return response()->json($getArchivedDocuments);
        else:
            return response()->json("No archived document found!", 204);
        endif;
    }
}
