<?php

namespace App\UseCases\UserUseCases;

use App\Http\Resources\UserRessource;
use App\Interfaces\UserRepositoryInterface;
use Ramsey\Collection\Collection;

class FindUserByIdUseCase
{
    protected UserRepositoryInterface $userRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id)
    {
        $user = $this->userRepository->find($id);

        if($user):
            return new UserRessource($user);
        else:
            return null;
        endif;
    }
}
