<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdateUserRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($this->activated == true):
            $status = 'active';
        elseif ($this->activated == false):
            $status = 'not active';
        endif;

        return [
            'id'        => $this->id,
            'full name' => $this->full_name,
            'email'     => $this->email,
            'status'    => $status,
            'update at' => $this->updated_at
        ];
    }
}
