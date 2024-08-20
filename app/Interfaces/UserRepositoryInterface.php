<?php

namespace App\Interfaces;

use App\Http\Requests\UserRequests\LoginUserRequest;
use Illuminate\Support\Facades\Request;

interface UserRepositoryInterface
{
    // CRUD
    public function all();
    public function find($id);
    public function create(array $request);
    public function update($id, array $request);
    public function delete($id);

    // Auth
    public function login(array $credentials);
    public function logout($id);

    // Status
    public function enable($id);
    public function disable($id);
}
