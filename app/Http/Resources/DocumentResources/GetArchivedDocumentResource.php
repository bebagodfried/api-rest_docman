<?php

namespace App\Http\Resources\DocumentResources;

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
            'label'     => $this->label,
            'client'    => $this->client,
            'link'      => route('document.show', $this->id),
            'timeline'  => new GetDocumentDateResource($request),
            'author'    => new GetDocumentAuthorResource($this->author),
        ];
    }
}
