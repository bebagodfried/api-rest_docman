<?php

namespace App\Repositories;

use App\Interfaces\HistoryRepositoryInterface;
use App\Models\History;
use Illuminate\Database\Eloquent\Collection;

class HistoryRepository implements HistoryRepositoryInterface
{
    protected History $model;
    /**
     * Create a new class instance.
     */
    public function __construct(History $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return History::all();
    }

    public function findAll($id)
    {
        $histories = $this->model::query();
        $histories->where('document_id', $id);

        return $histories;
    }
}
