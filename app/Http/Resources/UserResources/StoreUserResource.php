<?php

namespace App\Http\Resources\UserResources;

use Carbon\Carbon;
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
        return [
            'id'        => $this->id,
            'full name' => $this->full_name,
            'email'     => $this->email,
            'profile'   => route('profile.show', $this->id),
            'is active' => $this->activated ?? 'yes',
            'created_at'=> Carbon::parse($this->created_at)->toDateTimeString(),
        ];
    }
}
