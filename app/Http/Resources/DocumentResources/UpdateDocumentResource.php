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

        $document = [
            'id'        => $this->id,
            'label'     => $this->label,
            'client'    => $this->client,
            'start_date'=> $this->start_date,
        ];

        if($this->end_date):
            $document['end_date'] = $this->end_date;
        endif;

        if($archived):
            $document['archived'] = $status;
        endif;

        return $document;
    }
}
