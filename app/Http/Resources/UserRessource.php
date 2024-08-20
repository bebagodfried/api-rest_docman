<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRessource extends JsonResource
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
            'full_name' => $this->full_name,
            'email'     => $this->email,
            'status'    => ($this->activated ? 'active' : 'not active'),
            'created at'=> $this->created_at,
            'updated at'=> $this->updated_at
        ];
    }
}
