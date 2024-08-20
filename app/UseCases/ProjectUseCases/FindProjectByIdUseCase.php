<?php

namespace App\UseCases\ProjectUseCases;

use App\Http\Resources\ProjectResources\ProjectRessource;
use App\Interfaces\ProjectRepositoryInterface;

class FindProjectByIdUseCase
{
    protected ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function execute($id): ?ProjectRessource
    {
        $project = $this->projectRepository->find($id);

        if($project):
            return new ProjectRessource($project);
        else:
            return null;
        endif;
    }
}
