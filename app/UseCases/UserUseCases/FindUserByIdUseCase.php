<?php

namespace App\UseCases\UserUseCases;

use App\Http\Resources\UserResources\GetUserResource;
use App\Interfaces\UserRepositoryInterface;

class FindUserByIdUseCase
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id): ?GetUserResource
    {
        $user = $this->userRepository->find($id);

        if($user):
            return new GetUserResource($user);
        else:
            return null;
        endif;
    }
}
