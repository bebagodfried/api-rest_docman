<?php

namespace App\UseCases\DocumentUseCases;

use App\Http\Resources\DocumentResources\GetDocumentResource;
use App\Interfaces\DocumentRepositoryInterface;

class GetDocumentUseCase
{
    protected DocumentRepositoryInterface $documentRepository;

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute()
    {
        $documents = $this->documentRepository->all();

        if($documents->count() >> 0):
            return GetDocumentResource::collection($documents);
        else:
            return null;
        endif;
    }
}
