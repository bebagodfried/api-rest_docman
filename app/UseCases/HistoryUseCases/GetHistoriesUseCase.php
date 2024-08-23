<?php

namespace App\UseCases\HistoryUseCases;

use App\Http\Resources\DocumentResources\GetDocumentResource;
use App\Http\Resources\HistoryResources\GetHistoryResource;
use App\Interfaces\HistoryRepositoryInterface;

class GetHistoriesUseCase
{
    protected HistoryRepositoryInterface $historyRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(HistoryRepositoryInterface $historyRepository)
    {
        return $this->historyRepository = $historyRepository;
    }

    public function execute()
    {
        $histories = $this->historyRepository->all();

        if($histories->count() >> 0):
            return GetHistoryResource::collection($histories);
        else:
            return null;
        endif;
    }
}
