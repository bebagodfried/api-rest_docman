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
        return $documents::all();
    }

    public function find($id): ?History
    {
        $document = $this->model::query()->find($id);

        if($document):
            return $document;
        endif;

        return null;
    }

    public function create(array $request): History
    {
        $document            = new History();
        $document->label     = $request['label'];
        $document->client    = $request['client'];
        $document->start_date= $request['start_date'];
        $document->end_date  = $request['end_date'];
        $document->archived  = $request['archived'];

        $document->author()->associate(auth()->user());
        $document->save();

        return $document;
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

    public function delete($id): bool
    {
        $document = $this->model::query()->find($id);

        if($document):
            return $document->delete();
        endif;

        return false;
    }

    public function archived($id): ?History
    {
        $document = $this->model::query()->find($id);

        if($document):
            $document->archived = true;
            $document->save();
            return $document;
        endif;

        return null;
    }

    public function unArchived($id)
    {
        $document = $this->model::query()->find($id);

        if($document):
            $document->archived = false;
            $document->save();
            return $document;
        endif;

        return null;
    }
}
