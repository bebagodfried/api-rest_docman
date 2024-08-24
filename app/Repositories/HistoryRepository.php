<?php

namespace App\Repositories;

use App\Interfaces\HistoryRepositoryInterface;
use App\Models\History;
use Illuminate\Database\Eloquent\Collection;

class HistoryRepository implements HistoryRepositoryInterface
{
    protected History $model;

    public function __construct(History $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        $documents = $this->model;
        return $documents::with('document', 'user')->get();
    }

    public function find($id): ?History
    {
        $document = $this->model::query()->find($id);

        if($document):
            return $document;
        endif;

        return null;
    }

    public function findByDocId($id): ?Collection
    {
        $histories = $this->model::with('document', 'user')->where('document_id', $id)->get();

        if($histories):
            return $histories;
        endif;

        return null;
    }

    public function create(array $request)
    {
        //
    }

    public function update($id, array $request): ?History
    {
        $document = $this->model::query()->find($id);

        if($document):
            $document->update($request);
            return $this->model::query()->find($id);
        endif;

        return null;
    }
}
