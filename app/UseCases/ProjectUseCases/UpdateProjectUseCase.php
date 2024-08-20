<?php

namespace App\UseCases\ProjectUseCases;

use App\Interfaces\ProjectRepositoryInterface;

class UpdateProjectUseCase
{
    protected ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function execute($id, array $request)
    {
        $project = $request;
        return $this->projectRepository->update($id, $project);
    }
}
