<?php

namespace App\UseCases\DocumentUseCases;

use App\Http\Resources\DocumentResources\GetDocumentResource;
use App\Interfaces\DocumentRepositoryInterface;

class FindDocumentByIdUseCase
{
    protected DocumentRepositoryInterface $documentRepository;

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute($id): ?GetDocumentResource
    {
        $document = $this->documentRepository->find($id);

        if($document):
            return new GetDocumentResource($document);
        else:
            return null;
        endif;
    }
}
