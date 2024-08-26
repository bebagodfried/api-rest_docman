<?php

namespace App\Http\Controllers\Api\v1\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResources\GetProjectsByAuthorIdResource;
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

        if($projects !== null && $projects->count() > 0):
            $projects = GetProjectsByAuthorIdResource::collection($projects);
            return response()->json($projects);

        elseif($projects !== null):
            return response()->json("User with id=$id has no project!", 204);

        else:
            return response()->json("Bad request on user resources, please check and try again!", 400);
        endif;
    }
}
