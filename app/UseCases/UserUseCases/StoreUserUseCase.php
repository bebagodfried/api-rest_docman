<?php

namespace App\UseCases\UserUseCases;

use App\Interfaces\UserRepositoryInterface;

class StoreUserUseCase
{
    protected UserRepositoryInterface $userRepository;

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
