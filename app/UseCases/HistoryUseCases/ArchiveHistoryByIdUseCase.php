<?php

namespace App\UseCases\HistoryUseCases;

use App\Interfaces\HistoryRepositoryInterface;

class ArchiveHistoryByIdUseCase
{
    protected HistoryRepositoryInterface $documentRepository;

    public function __construct(HistoryRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute($id)
    {
        return $this->documentRepository->archived($id);
    }
}
