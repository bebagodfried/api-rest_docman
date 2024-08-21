<?php

namespace App\Http\Controllers\Api\v1\ProjectControllers;

use App\Http\Resources\ProjectResources\ProjectAuthorRessource;
use App\UseCases\ProjectUseCases\GetAuthorProjectByIdUseCase;
use Illuminate\Http\JsonResponse;

class GetProjectAuthorByIdController
{
    protected GetAuthorProjectByIdUseCase $projectService;
    public function __construct(GetAuthorProjectByIdUseCase $projectService)
    {
        $this->projectService = $projectService;
    }

    public function getAuthor($id): JsonResponse
    {
        $author = $this->projectService->execute($id);

        if($author):
            $author = new ProjectAuthorRessource($author);
            return response()->json($author);
        else:
            return response()->json("No project with id=$id here!", 404);
        endif;
    }
}
