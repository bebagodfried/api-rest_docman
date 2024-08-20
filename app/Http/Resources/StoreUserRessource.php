<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreUserRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if($this->activated == null):
            $default = 'active';
        endif;

        return [
            'id'        => $this->id,
            'full name' => $this->full_name,
            'email'     => $this->email,
            'status'    => $this->activated ?? $default,
            'created at'=> $this->created_at
        ];
    }
}
