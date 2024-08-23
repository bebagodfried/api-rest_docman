<?php

namespace App\Http\Controllers\Api\v1\DocumentControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequests\UpdateDocumentRequest;
use App\Http\Resources\DocumentResources\UpdateDocumentResource;
use App\UseCases\DocumentUseCases\UpdateDocumentUseCase;
use Illuminate\Http\JsonResponse;

class UpdateDocumentController extends Controller
{
    protected UpdateDocumentUseCase $documentService;
    public function __construct(UpdateDocumentUseCase $documentService)
    {
        $this->documentService = $documentService;
    }

    public function update($id, UpdateDocumentRequest $request): JsonResponse
    {
        $update                 = $request->validated();
        $update['updater_id']   = auth()->id();
        $document               = $this->documentService->execute($id, $update);

        if($document):
            $document = new UpdateDocumentResource($document);
            return response()->json($document);
        else:
            return response()->json("Bad request no document with id=$id!", 400);
        endif;
    }
}
