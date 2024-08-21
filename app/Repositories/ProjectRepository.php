<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectRepository implements ProjectRepositoryInterface
{
    protected Project $model;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        $projects = $this->model;
        return $projects::all();
    }

    public function find($id): ?Project
    {
        $project = $this->model::query()->find($id);

        if($project):
            return $project;
        endif;

        return null;
    }

    public function create(array $request): Project
    {
        $project            = new Project();
        $project->label     = $request['label'];
        $project->client    = $request['client'];
        $project->start_date= $request['start_date'];
        $project->end_date  = $request['end_date'];
        $project->archived  = $request['archived'];

        $project->author()->associate(auth()->user());
        $project->save();

        return $project;
    }

    public function update($id, array $request): ?Project
    {
        $project = $this->model::query()->whereKey($id);

        if($project):
            $project->update($request);
            return $this->model::query()->find($id);
        endif;

        return null;
    }

    public function delete($id): bool
    {
        $project = $this->model::query()->find($id);

        if($project):
            return $project->delete();
        endif;

        return false;
    }

    public function archived($id): ?Project
    {
        $project = $this->model::query()->find($id);

        if($project):
            $project->archived = true;
            $project->save();
            return $project;
        endif;

        return null;
    }

    public function unarchived($id)
    {
        $project = $this->model::query()->find($id);

        if($project):
            $project->archived = false;
            $project->save();
            return $project;
        endif;

        return false;
    }
}
