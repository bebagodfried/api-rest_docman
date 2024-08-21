<?php

namespace App\Http\Resources\ProjectResources;

use App\Http\Resources\UserRessource;
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

class ProjectRessource extends JsonResource
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
            'archived'  => $status,
            'timeline'  => [
                'start date'=> $this->start_date,
                'end date'  => $this->end_date ?? 'not finished'],
            'author'        => [
                'full name' => $this->author->full_name,
                'email'     => $this->author->email],
        ];
    }
}
