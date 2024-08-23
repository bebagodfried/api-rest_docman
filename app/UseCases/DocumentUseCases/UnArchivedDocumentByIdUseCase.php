<?php

namespace App\UseCases\DocumentUseCases;

use App\Interfaces\DocumentRepositoryInterface;

class UnArchivedDocumentByIdUseCase
{
    protected DocumentRepositoryInterface $userRepository;

    public function __construct(DocumentRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id)
    {
        return $this->userRepository->unarchived($id);
    }
}
