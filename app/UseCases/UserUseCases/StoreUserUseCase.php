<?php

namespace App\UseCases\UserUseCases;

use App\Http\Requests\UserRequests\StoreUserRequest;
use App\Interfaces\UserRepositoryInterface;

class StoreUserUseCase
{
    protected UserRepositoryInterface $userRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(array $request)
    {
        $user = $request;
        return $this->userRepository->create($user);
    }
}
