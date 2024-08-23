<?php

namespace App\Http\Controllers\Api\v1\DocumentControllers;

use App\Http\Controllers\Controller;
use App\UseCases\DocumentUseCases\DestroyDocumentUseCase;
use Illuminate\Http\JsonResponse;

class DestroyDocumentController extends Controller
{
    protected DestroyDocumentUseCase $documentService;
    public function __construct(DestroyDocumentUseCase $documentService)
    {
        $this->documentService = $documentService;
    }

    public function destroy($id): JsonResponse
    {
        $delete = $this->documentService->execute($id);

        if($delete):
            return response()->json("Document with id=$id deleted successfully");
        else:
            return response()->json("Bad request no document with id=$id!", 400);
        endif;
    }
}
