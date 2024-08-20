<?php

namespace App\UseCases\UserUseCases;

use App\Http\Requests\UserRequests\LoginUserRequest;
use App\Interfaces\UserRepositoryInterface;

class LoginUserUseCase
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
        $credentials = $request;
        return $this->userRepository->login($credentials);
    }
}
