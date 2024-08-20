<?php

namespace App\Http\Controllers\Api\v1\ProjectControllers;

use App\Http\Controllers\Controller;
use App\UseCases\ProjectUseCases\GetProjectUseCase;
use Illuminate\Http\JsonResponse;

class GetProjectsController extends Controller
{
    protected GetProjectUseCase $projectService;
    public function __construct(GetProjectUseCase $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(): JsonResponse
    {
        $projects = $this->projectService->execute();

        if($projects):
            return response()->json($projects);
        else:
            return response()->json('Nothing here!');
        endif;
    }
}
