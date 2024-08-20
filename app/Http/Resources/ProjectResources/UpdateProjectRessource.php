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
 * @property mixed $updated_at
 */

class UpdateProjectRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($this->archived):
            $status = 'active';
        else:
            $status = 'not active';
        endif;

        return [
            'id'        => $this->id,
            'label'     => $this->label,
            'client'    => $this->client,
            'start date'=> $this->start_date,
            'end date'  => $this->end_date,
            'archived'  => $status,
            'update at' => $this->updated_at
        ];
    }
}
