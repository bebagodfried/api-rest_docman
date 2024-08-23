<?php

namespace App\UseCases\DocumentUseCases;

use App\Interfaces\DocumentRepositoryInterface;

class StoreDocumentUseCase
{
    protected DocumentRepositoryInterface $documentRepository;

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute(array $request)
    {
        return $this->documentRepository->upload($request);
    }
}
