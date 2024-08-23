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

class GetDocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($this->archived):
            $status = 'yes';
        else:
            $status = 'no';
        endif;

        return [
            'id'        => $this->id,
            'label'     => $this->label,
            'client'    => $this->client,
            'link'      => route('document.show', $this->id),
            'archived'  => $status,
            'timeline'  => new GetDocumentDateResource($request),
            'author'    => new GetDocumentAuthorResource($this->author),
        ];
    }
}
