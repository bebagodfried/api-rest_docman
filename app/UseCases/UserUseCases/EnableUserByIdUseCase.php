<?php

namespace App\UseCases\UserUseCases;

use App\Interfaces\UserRepositoryInterface;

class EnableUserByIdUseCase
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id)
    {
        return $this->userRepository->enable($id);
    }
}
