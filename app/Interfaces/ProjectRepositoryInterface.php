<?php

namespace App\Interfaces;

interface ProjectRepositoryInterface
{
    // CRUD
    public function all();
    public function find($id);
    public function create(array $request);
    public function update($id, array $request);
    public function delete($id);

    // Status
    public function archived($id);
    public function unArchived($id);
}
