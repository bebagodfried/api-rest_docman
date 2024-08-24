<?php

namespace App\Http\Controllers\Api\v1\DocumentControllers;

use App\Http\Controllers\Controller;
use App\UseCases\DocumentUseCases\ArchiveDocumentByIdUseCase;
use Illuminate\Http\JsonResponse;

class ArchiveDocumentByIdController extends Controller
{
    protected ArchiveDocumentByIdUseCase $documentService;
    public function __construct(ArchiveDocumentByIdUseCase $documentService)
    {
        $this->documentService = $documentService;
    }
    public function archive($id): JsonResponse
    {
        $document = $this->documentService->execute($id);

        if($document):
            return response()->json("Document with id=$id archived successfully");
        else:
            return response()->json("No document with id=$id here!", 400);
        endif;
    }
}
