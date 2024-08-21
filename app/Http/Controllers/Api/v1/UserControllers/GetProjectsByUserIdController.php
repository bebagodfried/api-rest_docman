<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\GetProjectsByAuthorIdResource;
use App\UseCases\UserUseCases\GetProjectsByUserIdUseCase;
use Illuminate\Http\JsonResponse;

class GetProjectsByUserIdController extends Controller
{
    protected GetProjectsByUserIdUseCase $projectService;
    public function __construct(GetProjectsByUserIdUseCase $projectService)
    {
        $this->projectService = $projectService;
    }

    public function getProjects($id): JsonResponse
    {
        $projects = $this->projectService->execute($id);

        if($projects):
            $projects = GetProjectsByAuthorIdResource::collection($projects);
            return response()->json($projects);
        else:
            return response()->json("No project with id=$id here!", 404);
        endif;
    }
}
