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

class StoreDocumentResource extends JsonResource
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

        $document = [
            'id'        => $this->id,
            'label'     => $this->label,
            'client'    => $this->client,
            'start_date'=> $this->start_date,
            'link'      =>route('document.show', $this->id),
        ];

        // has end_date
        if($this->end_date):
            $document['end_date'] = $this->end_date;
        endif;

        // is archived
        $document['archived'] = $status;

        return $document;
    }
}
