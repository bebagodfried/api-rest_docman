<?php

namespace App\Http\Controllers\Api\v1\ProjectControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequests\UpdateProjectRequest;
use App\Http\Resources\ProjectResources\UpdateProjectRessource;
use App\UseCases\ProjectUseCases\UpdateProjectUseCase;
use Illuminate\Http\JsonResponse;

class UpdateProjectController extends Controller
{
    protected UpdateProjectUseCase $projectService;
    public function __construct(UpdateProjectUseCase $projectService)
    {
        $this->projectService = $projectService;
    }

    public function update($id, UpdateProjectRequest $request): JsonResponse
    {
        $update = $request->validated();
        $project   = $this->projectService->execute($id, $update);

        if($project):
            $project = new UpdateProjectRessource($project);
            return response()->json($project);
        else:
            return response()->json("Bad request no project with id=$id!", 400);
        endif;
    }
}
