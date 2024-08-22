<?php

namespace App\UseCases\UserUseCases;

use App\Http\Resources\UserResources\GetUserResource;
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
            return GetUserResource::collection($users);
        else:
            return null;
        endif;
    }
}
