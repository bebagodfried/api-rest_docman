<?php

namespace App\UseCases\ProjectUseCases;

use App\Interfaces\ProjectRepositoryInterface;

class UnarchivedProjectByIdUseCase
{
    protected ProjectRepositoryInterface $userRepository;

    public function __construct(ProjectRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id)
    {
        return $this->userRepository->unarchived($id);
    }
}
