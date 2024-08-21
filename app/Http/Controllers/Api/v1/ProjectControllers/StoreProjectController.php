<?php

namespace App\Http\Controllers\Api\v1\ProjectControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequests\StoreProjectRequest;
use App\Http\Resources\ProjectResources\StoreProjectRessource;
use App\UseCases\ProjectUseCases\StoreProjectUseCase;
use Illuminate\Http\JsonResponse;

class StoreProjectController extends Controller
{
    protected StoreProjectUseCase $projectService;
    public function __construct(StoreProjectUseCase $projectService)
    {
        $this->projectService = $projectService;
    }

    public function store(StoreProjectRequest $request): JsonResponse
    {
        $request                = $request->validated();
        $request['end_date']    = $request['end_date'] ?? null;
        $request['archived']    = $request['archived'] ?? false;

        $project   = $this->projectService->execute($request);

        if($project):
            $project = new StoreProjectRessource($project);
            return response()->json($project);
        else:
            return response()->json('Something went wrong!', 500);
        endif;
    }
}
