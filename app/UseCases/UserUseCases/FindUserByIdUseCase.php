<?php

namespace App\UseCases\UserUseCases;

use App\Http\Resources\UserRessource;
use App\Interfaces\UserRepositoryInterface;

class FindUserByIdUseCase
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id): ?UserRessource
    {
        $user = $this->userRepository->find($id);

        if($user):
            return new UserRessource($user);
        else:
            return null;
        endif;
    }
}
