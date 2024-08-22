<?php

namespace App\Http\Controllers\Api\v1\ProjectControllers;

use App\Http\Resources\ProjectResources\GetArchivedProjectResource;
use App\UseCases\ProjectUseCases\GetArchivedProjectsUseCase;
use Illuminate\Http\JsonResponse;

class GetArchivedProjectsController
{
    protected GetArchivedProjectsUseCase $projectService;
    public function __construct(GetArchivedProjectsUseCase $projectService)
    {
        $this->projectService = $projectService;
    }

    public function getArchived(): JsonResponse
    {
        $getArchivedProjects = $this->projectService->execute();

        if($getArchivedProjects):
            $getArchivedProjects = GetArchivedProjectResource::collection($getArchivedProjects);
            return response()->json($getArchivedProjects);
        else:
            return response()->json("No archived project found!", 204);
        endif;
    }
}
