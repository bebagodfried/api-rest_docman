<?php

namespace App\UseCases\DocumentUseCases;

use App\Interfaces\DocumentRepositoryInterface;
use App\Models\History;

/*
 * @property mixed $histories
 */
class UpdateDocumentUseCase
{
    protected DocumentRepositoryInterface $documentRepository;

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function execute($id, array $request)
    {
        // history
        $commit = $request['commit'];

        $history            = new History();
        $history->commit    = $commit;

        $history->document()->associate($id);
        $history->user()->associate(auth()->id());
        $history->save();

        // --
        $document = $request;
        return $this->documentRepository->update($id, $document);
    }
}
