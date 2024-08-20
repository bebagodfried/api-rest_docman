<?php

namespace App\UseCases\UserUseCases;

use App\Http\Resources\UserRessource;
use App\Interfaces\UserRepositoryInterface;
use Ramsey\Collection\Collection;

class EnableUserByIdUseCase
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
        return $this->userRepository->enable($id);
    }
}
