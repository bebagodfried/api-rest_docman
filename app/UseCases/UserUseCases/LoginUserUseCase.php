<?php

namespace App\UseCases\UserUseCases;

use App\Interfaces\UserRepositoryInterface;

class LoginUserUseCase
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
