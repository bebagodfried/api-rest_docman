<?php

namespace App\Http\Controllers\Api\v1\DocumentControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequests\StoreDocumentRequest;
use App\Http\Resources\DocumentResources\StoreDocumentResource;
use App\Models\Project;
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
        $submitted      = $request->validated();

        // get project
        $project        = Project::query()->whereKey($submitted['project_id'])->first();
        $clientName     = $project->client;
        $projectName    = $project->label;

        // set document file
        $document       = $submitted['file'];
        $documentName   = str_replace(' ', '_',"{$document->getClientOriginalName()}");
        $documentPath   = str_replace(' ', '_',"documents/$clientName/$projectName");

        $request->file('file')->storeAs("public/$documentPath", $documentName);

        $submitted['project_id']= $project->id;
        $submitted['file_path'] = "/$documentPath/$documentName";
        $submitted['archived']  = $submitted['archived'] ?? false;

        $document               = $this->documentService->execute($submitted);

        if($document):
            $document = new StoreDocumentResource($document);
            return response()->json($document, 201);
        else:
            return response()->json('Something went wrong!', 500);
        endif;
    }
}
