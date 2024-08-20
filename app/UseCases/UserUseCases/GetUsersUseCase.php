<?php

namespace App\UseCases\UserUseCases;

use App\Http\Resources\UserRessource;
use App\Interfaces\UserRepositoryInterface;

class GetUsersUseCase
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute()
    {
        $users = $this->userRepository->all();

        if($users->count() >> 0):
            return UserRessource::collection($users);
        else:
            return null;
        endif;
    }
}
