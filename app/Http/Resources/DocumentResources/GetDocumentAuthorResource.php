<?php

namespace App\Http\Resources\DocumentResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $full_name
 * @property mixed $email
 * @property mixed $author
 */
class GetDocumentAuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'full_name' => $this->full_name,
            'email'     => $this->email,
            'profile'   => route('author.show', $this->id),
        ];
    }
}
