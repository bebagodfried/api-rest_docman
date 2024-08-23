<?php

namespace App\UseCases\HistoryUseCases;

use App\Http\Resources\HistoryResources\GetHistoryResource;
use App\Interfaces\HistoryRepositoryInterface;

class FindHistoryByIdUseCase
{
    protected HistoryRepositoryInterface $documentRepository;

    public function __construct(HistoryRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute($id): ?GetHistoryResource
    {
        $document = $this->documentRepository->find($id);

        if($document):
            return new GetHistoryResource($document);
        else:
            return null;
        endif;
    }
}
