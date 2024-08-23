<?php

namespace App\UseCases\HistoryUseCases;

use App\Interfaces\HistoryRepositoryInterface;

class GetArchivedHistorysUseCase
{
    protected HistoryRepositoryInterface $documentRepository;

    public function __construct(HistoryRepositoryInterface $documentRepository)
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
