<?php

namespace App\Http\Controllers\Api\v1\DocumentControllers;

use App\Http\Controllers\Controller;
use App\UseCases\DocumentUseCases\GetDocumentUseCase;
use Illuminate\Http\JsonResponse;

class GetDocumentsController extends Controller
{
    protected GetDocumentUseCase $documentService;
    public function __construct(GetDocumentUseCase $documentService)
    {
        $this->documentService = $documentService;
    }

    public function index(): JsonResponse
    {
        $documents = $this->documentService->execute();

        if($documents):
            return response()->json($documents);
        else:
            return response()->json('Nothing here!', 204);
        endif;
    }
}
