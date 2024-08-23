<?php

namespace App\UseCases\HistoryUseCases;

use App\Interfaces\HistoryRepositoryInterface;

class GetAuthorByHistoryIdUseCase
{
    protected HistoryRepositoryInterface $documentRepository;

    public function __construct(HistoryRepositoryInterface $documentRepository)
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
