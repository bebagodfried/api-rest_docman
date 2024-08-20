<?php

namespace App\UseCases\UserUseCases;

use App\Http\Resources\UserRessource;
use App\Interfaces\UserRepositoryInterface;
use Ramsey\Collection\Collection;

class GetUsersUseCase
{
    protected UserRepositoryInterface $userRepository;
    /**
     * Create a new class instance.
     */
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
