<?php

namespace App\UseCases\UserUseCases\Auth;

use App\Interfaces\UserRepositoryInterface;

class AuthUserUseCase
{
    protected UserRepositoryInterface $userRepository;

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
