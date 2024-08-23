<?php

namespace App\Repositories;

use App\Interfaces\DocumentRepositoryInterface;
use App\Models\Document;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class DocumentRepository implements DocumentRepositoryInterface
{
    protected Document $model;

    public function __construct(Document $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        $documents = $this->model;
        return $documents::all();
    }

    public function find($id): ?Document
    {
        $document = $this->model::query()->find($id);

        if($document):
            return $document;
        endif;

        return null;
    }

    public function upload(array $request): Document
    {
        $document               = new Document();
        $document->name         = $request['name'];
        $document->path         = $request['file_path'];
        $document->archived     = $request['archived'];

        $document->author()->associate(auth()->user());
        $document->project()->associate($request['project_id']);

        $document->save();

        return $document;
    }

    public function update($id, array $request): ?Document
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

    public function archived($id): ?Document
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
