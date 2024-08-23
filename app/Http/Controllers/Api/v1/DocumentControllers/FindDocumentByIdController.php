<?php

namespace App\Http\Controllers\Api\v1\DocumentControllers;

use App\Http\Controllers\Controller;
use App\UseCases\DocumentUseCases\FindDocumentByIdUseCase;
use Illuminate\Http\JsonResponse;

class FindDocumentByIdController extends Controller
{
    protected FindDocumentByIdUseCase $documentService;
    public function __construct(FindDocumentByIdUseCase $documentService)
    {
        $this->documentService = $documentService;
    }

    public function show($id): JsonResponse
    {
        $document = $this->documentService->execute($id);

        if($document):
            return response()->json($document);
        else:
            return response()->json("No document with id=$id here!", 404);
        endif;
    }
}
