<?php

namespace App\Http\Resources\DocumentResources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property mixed $updater
 */

class GetDocumentDateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $timeline = [
            'created_at'=> Carbon::parse($this->created_at)->toDateTimeString(),
        ];

        if ($this->created_at != $this->updated_at):
            $timeline['update_at'] = Carbon::parse($this->updated_at)->toDateTimeString();
            $timeline['update by'] = new GetDocumentAuthorResource($this->updater);
        endif;

        return $timeline;
    }
}
