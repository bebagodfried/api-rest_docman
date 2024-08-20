<?php

namespace App\UseCases\ProjectUseCases;

use App\Http\Resources\ProjectResources\ProjectRessource;
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
            return ProjectRessource::collection($projects);
        else:
            return null;
        endif;
    }
}
