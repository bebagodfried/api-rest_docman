<?php

namespace App\UseCases\HistoryUseCases;

use App\Interfaces\HistoryRepositoryInterface;

class UpdateHistoryUseCase
{
    protected HistoryRepositoryInterface $documentRepository;

    public function __construct(HistoryRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute($id, array $request)
    {
        $document = $request;
        return $this->documentRepository->update($id, $document);
    }
}
