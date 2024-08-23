<?php

namespace App\UseCases\HistoryUseCases;

use App\Interfaces\HistoryRepositoryInterface;

class UnArchivedHistoryByIdUseCase
{
    protected HistoryRepositoryInterface $userRepository;

    public function __construct(HistoryRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id)
    {
        return $this->userRepository->unarchived($id);
    }
}
