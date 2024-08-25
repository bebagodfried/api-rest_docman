<?php

namespace App\UseCases\DocumentUseCases;

use App\Interfaces\DocumentRepositoryInterface;
use App\Interfaces\HistoryRepositoryInterface;

class GetHistoryByDocumentIdUseCase
{
    protected HistoryRepositoryInterface $documentRepository;

    public function __construct(HistoryRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute($id)
    {
        $document = $this->documentRepository->findByDocId($id);

        if($document):
            return $document;
        else:
            return null;
        endif;
    }
}
