<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

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
        return $this->model::query()->create($request);
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
