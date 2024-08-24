<?php

namespace App\UseCases\HistoryUseCases;

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
        $histories = $this->documentRepository->findByDocId($id);

        if($histories):
            return $histories;
        else:
            return null;
        endif;
    }
}
