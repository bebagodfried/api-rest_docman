<?php

namespace App\UseCases\HistoryUseCases;

use App\Http\Resources\HistoryResources\GetHistoryResource;
use App\Interfaces\HistoryRepositoryInterface;

class GetHistoryUseCase
{
    protected HistoryRepositoryInterface $documentRepository;

    public function __construct(HistoryRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute()
    {
        $documents = $this->documentRepository->all();

        if($documents->count() >> 0):
            return GetHistoryResource::collection($documents);
        else:
            return null;
        endif;
    }
}
