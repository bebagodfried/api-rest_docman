<?php

namespace App\Http\Controllers\Api\v1\ProjectControllers;

use App\Http\Controllers\Controller;
use App\UseCases\ProjectUseCases\UnArchivedProjectByIdUseCase;
use Illuminate\Http\JsonResponse;

class UnArchivedProjectByIdController extends Controller
{
    protected UnArchivedProjectByIdUseCase $projectService;
    public function __construct(UnArchivedProjectByIdUseCase $projectService)
    {
        $this->projectService = $projectService;
    }

    public function unarchived($id): JsonResponse
    {
        $project = $this->projectService->execute($id);

        if($project):
            return response()->json("Project with id=$id unarchived successfully");
        else:
            return response()->json("No project with id=$id here!", 404);
        endif;
    }
}
