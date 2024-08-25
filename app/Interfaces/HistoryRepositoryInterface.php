<?php

namespace App\Interfaces;

use Ramsey\Collection\Collection;

interface HistoryRepositoryInterface
{
    // CRUD
    public function all();
    public function find($id);
    public function findByDocId($id);
    public function create(array $request);
    public function update($id, array $request);
}
