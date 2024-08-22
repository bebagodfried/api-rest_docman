<?php

namespace App\Http\Resources\ProjectResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $label
 * @property mixed $client
 * @property mixed $start_date
 * @property mixed $end_date
 * @property mixed $archived
 * @property mixed $author
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class GetArchivedProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'label'     => $this->label,
            'client'    => $this->client,
            'link'      => route('project.show', $this->id),
            'timeline'  => new GetProjectDateResource($request),
            'author'    => new GetProjectAuthorResource($this->author),
        ];
    }
}
