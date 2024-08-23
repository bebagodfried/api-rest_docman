<?php

namespace App\UseCases\DocumentUseCases;

use App\Interfaces\DocumentRepositoryInterface;

class GetArchivedDocumentsUseCase
{
    protected DocumentRepositoryInterface $documentRepository;

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute()
    {
        $documents = $this->documentRepository->all();
        $documents = $documents->where('archived', true);

        if($documents->count() > 0):
            return $documents;
        else:
            return null;
        endif;
    }
}
