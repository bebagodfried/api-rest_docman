<?php

namespace App\UseCases\ProjectUseCases;

use App\Interfaces\ProjectRepositoryInterface;

class GetAuthorByProjectIdUseCase
{
    protected ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function execute($id)
    {
        $project = $this->projectRepository->find($id);

        if($project):
            return $project->author;
        else:
            return null;
        endif;
    }
}
