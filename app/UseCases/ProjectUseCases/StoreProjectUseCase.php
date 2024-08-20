<?php

namespace App\UseCases\ProjectUseCases;

use App\Interfaces\ProjectRepositoryInterface;

/**
 * @property mixed $label
 * @property mixed $client
 * @property mixed $start_date
 * @property mixed $end_date
 */

class StoreProjectUseCase
{
    protected ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function execute(array $request)
    {
        $project = $request;
        return $this->projectRepository->create([
            'label'     => $project['label'],
            'client'    => $project['client'],
            'start_date'=> $project['start_date'],
            'end_date'  => $project['end_date'] ?? null,
            'archived'  => $project['archived'] ?? false,
            'author_id' => auth()->id()
        ]);
    }
}
