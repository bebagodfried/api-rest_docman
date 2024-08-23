<?php

namespace App\UseCases\DocumentUseCases;

use App\Interfaces\DocumentRepositoryInterface;

class GetAuthorByDocumentIdUseCase
{
    protected DocumentRepositoryInterface $documentRepository;

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute($id)
    {
        $document = $this->documentRepository->find($id);

        if($document):
            return $document->author;
        else:
            return null;
        endif;
    }
}
