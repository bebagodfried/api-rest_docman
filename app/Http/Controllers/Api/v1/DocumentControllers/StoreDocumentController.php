<?php

namespace App\Http\Controllers\Api\v1\DocumentControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequests\StoreDocumentRequest;
use App\Http\Resources\DocumentResources\StoreDocumentResource;
use App\UseCases\DocumentUseCases\StoreDocumentUseCase;
use Illuminate\Http\JsonResponse;

class StoreDocumentController extends Controller
{
    protected StoreDocumentUseCase $documentService;
    public function __construct(StoreDocumentUseCase $documentService)
    {
        $this->documentService = $documentService;
    }

    public function store(StoreDocumentRequest $request): JsonResponse
    {
        $request                = $request->validated();
        $request['end_date']    = $request['end_date'] ?? null;
        $request['archived']    = $request['archived'] ?? false;

        $document   = $this->documentService->execute($request);

        if($document):
            $document = new StoreDocumentResource($document);
            return response()->json($document);
        else:
            return response()->json('Something went wrong!', 500);
        endif;
    }
}
