<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    // CRUD
    public function all();
    public function find($id);
    public function create(array $request);
    public function update($id, array $request);
    public function delete($id);

    // Auth
    public function login(array $data);
    public function logout($id);

    // Status
    public function enable($id);
    public function disable($id);
}
