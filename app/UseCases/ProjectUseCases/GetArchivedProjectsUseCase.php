<?php

namespace App\UseCases\ProjectUseCases;

use App\Interfaces\ProjectRepositoryInterface;

class GetArchivedProjectsUseCase
{
    protected ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function execute()
    {
        $projects = $this->projectRepository->all();
        $projects = $projects->where('archived', true);

        if($projects->count() > 0):
            return $projects;
        else:
            return null;
        endif;
    }
}
