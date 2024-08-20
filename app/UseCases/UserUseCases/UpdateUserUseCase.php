<?php

namespace App\UseCases\UserUseCases;

use App\Http\Requests\UserRequests\StoreUserRequest;
use App\Interfaces\UserRepositoryInterface;

class UpdateUserUseCase
{
    protected UserRepositoryInterface $userRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id, array $request)
    {
        $user = $request;
        return $this->userRepository->update($id, $user);
    }
}
