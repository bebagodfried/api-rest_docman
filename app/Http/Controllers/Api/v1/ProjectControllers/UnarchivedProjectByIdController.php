<?php

namespace App\Http\Controllers\Api\v1\ProjectControllers;

use App\Http\Controllers\Controller;
use App\UseCases\ProjectUseCases\UnarchivedProjectByIdUseCase;
use Illuminate\Http\JsonResponse;

class UnarchivedProjectByIdController extends Controller
{
    protected UnarchivedProjectByIdUseCase $projectService;
    public function __construct(UnarchivedProjectByIdUseCase $projectService)
    {
        $this->projectService = $projectService;
    }

    public function unarchived($id): JsonResponse
    {
        $project = $this->projectService->execute($id);

        if($project):
            return response()->json("Project with id=$id unarchived successfully");
        else:
            return response()->json("No project with id=$id here!");
        endif;
    }
}
