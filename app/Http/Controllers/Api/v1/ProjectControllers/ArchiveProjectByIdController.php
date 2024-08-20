<?php

namespace App\Http\Controllers\Api\v1\ProjectControllers;

use App\Http\Controllers\Controller;
use App\UseCases\ProjectUseCases\ArchiveProjectByIdUseCase;
use Illuminate\Http\JsonResponse;

class ArchiveProjectByIdController extends Controller
{
    protected ArchiveProjectByIdUseCase $projectService;
    public function __construct(ArchiveProjectByIdUseCase $projectService)
    {
        $this->projectService = $projectService;
    }
    public function archive($id): JsonResponse
    {
        $project = $this->projectService->execute($id);

        if($project):
            return response()->json("Project with id=$id archived successfully");
        else:
            return response()->json("No project with id=$id here!");
        endif;
    }
}
