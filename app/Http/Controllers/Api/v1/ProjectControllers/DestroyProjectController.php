<?php

namespace App\Http\Controllers\Api\v1\ProjectControllers;

use App\Http\Controllers\Controller;
use App\UseCases\ProjectUseCases\DestroyProjectUseCase;
use Illuminate\Http\JsonResponse;

class DestroyProjectController extends Controller
{
    protected DestroyProjectUseCase $projectService;
    public function __construct(DestroyProjectUseCase $projectService)
    {
        $this->projectService = $projectService;
    }

    public function destroy($id): JsonResponse
    {
        $delete = $this->projectService->execute($id);

        if($delete):
            return response()->json("Project with id=$id deleted successfully");
        else:
            return response()->json("Bad request no project with id=$id!", 400);
        endif;
    }
}
