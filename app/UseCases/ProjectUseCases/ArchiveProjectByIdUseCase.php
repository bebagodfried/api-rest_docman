<?php

namespace App\UseCases\ProjectUseCases;

use App\Interfaces\ProjectRepositoryInterface;

class ArchiveProjectByIdUseCase
{
    protected ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function execute($id)
    {
        return $this->projectRepository->archived($id);
    }
}
