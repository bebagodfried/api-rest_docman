<?php

namespace App\UseCases\DocumentUseCases;

use App\Interfaces\DocumentRepositoryInterface;

class DestroyDocumentUseCase
{
    protected DocumentRepositoryInterface $documentRepository;

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute($id)
    {
        return $this->documentRepository->delete($id);
    }
}
