<?php

namespace App\UseCases\ProjectUseCases;

use App\Http\Resources\ProjectResources\GetProjectResource;
use App\Interfaces\ProjectRepositoryInterface;

class FindProjectByIdUseCase
{
    protected ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function execute($id): ?GetProjectResource
    {
        $project = $this->projectRepository->find($id);

        if($project):
            return new GetProjectResource($project);
        else:
            return null;
        endif;
    }
}
