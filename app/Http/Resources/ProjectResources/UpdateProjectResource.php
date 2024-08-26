<?php

namespace App\Http\Resources\ProjectResources;

use Carbon\Carbon;
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

class UpdateProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $project = [
            'id'        => $this->id,
            'label'     => $this->label,
            'client'    => $this->client,
            'start_date'=> Carbon::parse($this->start_date)->toDateTimeString(),
        ];

        if($this->end_date):
            $project['end_date'] = $this->end_date;
        endif;

        $project['archived'] = ($this->archived)? 'yes' : 'no';;

        return $project;
    }
}
