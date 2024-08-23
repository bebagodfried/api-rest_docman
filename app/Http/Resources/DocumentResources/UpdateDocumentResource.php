<?php

namespace App\Http\Resources\DocumentResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $author
 * @property mixed $archived
 * @property mixed $project
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class UpdateDocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $archived = $this->archived;

        if($archived):
            $status = 'yes';
        else:
            $status = 'no';
        endif;

        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'project'   => $this->project->label,
            'link'      => route('document.show', $this->id),
            'archived'  => $status,
            'author'    => new GetDocumentAuthorResource($this->author),
            'timeline'  => new GetDocumentDateResource($this),
        ];
    }
}
