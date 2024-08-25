<?php

namespace App\UseCases\ProjectUseCases;

use App\Interfaces\ProjectRepositoryInterface;

class UpdateProjectUseCase
{
    protected ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function execute($id, array $request)
    {
        // history
//        $commit = $request['commit'];
//
//        $history            = new History();
//        $history->commit    = $commit;
//
//        $history->project()->associate($id);
//        $history->user()->associate(auth()->id());
//        $history->save();

        // --
        $project = $request;
        return $this->projectRepository->update($id, $project);
    }
}
