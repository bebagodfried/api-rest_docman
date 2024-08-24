<?php

namespace App\UseCases\DocumentUseCases;

use App\Interfaces\DocumentRepositoryInterface;
use App\Models\History;

class StoreDocumentUseCase
{
    protected DocumentRepositoryInterface $documentRepository;

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute(array $request)
    {
        $document = $this->documentRepository->upload($request);

        // history
        $commit = $request['commit'] ?? "new document";

        $history            = new History();
        $history->commit    = $commit;

        $history->document()->associate($document->id);
        $history->user()->associate(auth()->id());
        $history->save();

        // --
        return $document;
    }
}
