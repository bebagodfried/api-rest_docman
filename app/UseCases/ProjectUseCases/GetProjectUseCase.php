<?php

namespace App\UseCases\ProjectUseCases;

use App\Http\Resources\ProjectResources\GetProjectResource;
use App\Interfaces\ProjectRepositoryInterface;

class GetProjectUseCase
{
    protected ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function execute()
    {
        $projects = $this->projectRepository->all();

        if($projects->count() >> 0):
            return GetProjectResource::collection($projects);
        else:
            return null;
        endif;
    }
}
