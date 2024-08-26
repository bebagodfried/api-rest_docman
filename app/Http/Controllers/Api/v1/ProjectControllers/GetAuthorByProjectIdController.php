<?php

namespace App\Http\Controllers\Api\v1\ProjectControllers;

use App\Http\Resources\ProjectResources\GetProjectAuthorResource;
use App\UseCases\ProjectUseCases\GetAuthorByProjectIdUseCase;
use Illuminate\Http\JsonResponse;

class GetAuthorByProjectIdController
{
    protected GetAuthorByProjectIdUseCase $projectService;
    public function __construct(GetAuthorByProjectIdUseCase $projectService)
    {
        $this->projectService = $projectService;
    }

    public function getAuthor($id): JsonResponse
    {
        $author = $this->projectService->execute($id);

        if($author):
            $author = new GetProjectAuthorResource($author);
            return response()->json($author);
        else:
            return response()->json("Bad request on project resources, please check and try again!", 400);
        endif;
    }
}
