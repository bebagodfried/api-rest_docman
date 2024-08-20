<?php

namespace App\Repositories;

use App\Http\Requests\UserRequests\LoginUserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use http\Env\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserRepository implements UserRepositoryInterface
{
    protected User $model;

    /**
     * Create a new class instance.
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        $users = $this->model;
        return $users::all();
    }

    public function find($id): ?User
    {
        $user = $this->model::query()->find($id);

        if($user):
            return $user;
        endif;

        return null;
    }

    public function create(array $request): User
    {
        return $this->model::query()->create($request);
    }

    public function update($id, array $request): ?User
    {
        $user = $this->model::query()->whereKey($id);

        if($user):
            $user->update($request);
            return $this->model::query()->find($id);
        endif;

        return null;
    }

    public function delete($id): bool
    {
        $user = $this->model::query()->find($id);

        if($user):
            return $user->delete();
        endif;

        return false;
    }

    public function login(array $credentials)
    {
        $user = $this->model::query()
            ->where('email', $credentials['email'])->first();

        if(!$user || !Hash::check($credentials['password'], $user->password)):
            return null;
        endif;

        return $user;
    }

    public function logout($id)
    {
        // TODO: Implement logout() method.
    }

    public function enable($id): ?User
    {
        $user = $this->model::query()->find($id);

        if($user):
            $user->activated = true;
            $user->save();
            return $user;
        endif;

        return null;
    }

    public function disable($id)
    {
        $user = $this->model::query()->find($id);

        if($user):
            $user->activated = false;
            $user->save();
            return $user;
        endif;

        return false;
    }
}
