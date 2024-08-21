<?php

namespace App\Http\Controllers\Api\v1\ProjectControllers;

use App\Http\Controllers\Controller;
use App\UseCases\ProjectUseCases\FindProjectByIdUseCase;
use Illuminate\Http\JsonResponse;

class FindProjectByIdController extends Controller
{
    protected FindProjectByIdUseCase $projectService;
    public function __construct(FindProjectByIdUseCase $projectService)
    {
        $this->projectService = $projectService;
    }

    public function show($id): JsonResponse
    {
        $project = $this->projectService->execute($id);

        if($project):
            return response()->json($project);
        else:
            return response()->json("No project with id=$id here!", 404);
        endif;
    }
}
