<?php

namespace App\Http\Controllers\Api\v1\DocumentControllers;

use App\Http\Controllers\Controller;
use App\UseCases\DocumentUseCases\UnArchivedDocumentByIdUseCase;
use Illuminate\Http\JsonResponse;

class UnArchivedDocumentByIdController extends Controller
{
    protected UnArchivedDocumentByIdUseCase $documentService;
    public function __construct(UnArchivedDocumentByIdUseCase $documentService)
    {
        $this->documentService = $documentService;
    }

    public function unarchived($id): JsonResponse
    {
        $document = $this->documentService->execute($id);

        if($document):
            return response()->json("Document with id=$id unarchived successfully");
        else:
            return response()->json("No document with id=$id here!", 404);
        endif;
    }
}
