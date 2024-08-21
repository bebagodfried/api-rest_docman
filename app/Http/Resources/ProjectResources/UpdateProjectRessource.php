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
        $archived = $this->archived;

        if($archived):
            $status = 'yes';
        else:
            $status = 'no';
        endif;

        $project = [
            'id'        => $this->id,
            'label'     => $this->label,
            'client'    => $this->client,
            'start_date'=> $this->start_date,
        ];

        if($this->end_date):
            $project['end_date'] = $this->end_date;
        endif;

        if($archived):
            $project['archived'] = $status;
        endif;

        return $project;
    }
}
