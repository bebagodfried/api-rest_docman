<?php

namespace App\Http\Resources\DocumentResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $path
 * @property mixed $project
 * @property mixed $author
 * @property mixed $updated_at
 */
class GetArchivedDocumentResource extends JsonResource
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
            'name'      => $this->name,
            'project'   => $this->project->label,
            'path'      => $this->path,
            'link'      => route('document.show', $this->id),
            'author'    => new GetDocumentAuthorResource($this->author),
            'timeline'  => new GetDocumentDateResource($this),
        ];
    }
}
