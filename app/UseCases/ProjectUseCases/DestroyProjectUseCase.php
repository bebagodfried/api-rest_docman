<?php

namespace App\UseCases\ProjectUseCases;

use App\Interfaces\ProjectRepositoryInterface;

class DestroyProjectUseCase
{
    protected ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function execute($id)
    {
        return $this->projectRepository->delete($id);
    }
}
