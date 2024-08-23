<?php

namespace App\Http\Resources\UserResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $full_name
 * @property mixed $email
 * @property mixed $activated
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class GetUserResource extends JsonResource
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
            'full name' => $this->full_name,
            'email'     => $this->email,
            'is active' => ($this->activated ? 'yes' : 'no'),
            'created_at'=> $this->created_at,
            'updated_at'=> $this->updated_at
        ];
    }
}
