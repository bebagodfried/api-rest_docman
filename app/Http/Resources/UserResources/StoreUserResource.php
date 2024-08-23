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

class StoreUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $default = 'active';

        return [
            'id'        => $this->id,
            'full name' => $this->full_name,
            'email'     => $this->email,
            'status'    => $this->activated ?? $default,
            'created_at'=> $this->created_at
        ];
    }
}
