<?php

namespace App\UseCases\UserUseCases;

use App\Interfaces\UserRepositoryInterface;

class GetProjectsByUserIdUseCase
{
    protected UserRepositoryInterface $projectRepository;

    public function __construct(UserRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function execute($id)
    {
        $user = $this->projectRepository->find($id);

        if($user):
            return $user->projects;
        else:
            return null;
        endif;
    }
}
