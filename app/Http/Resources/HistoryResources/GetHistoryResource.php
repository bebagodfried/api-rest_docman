<?php

namespace App\Http\Resources\HistoryResources;

use App\Http\Resources\DocumentResources\GetDocumentAuthorResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $uid
 * @property mixed $commit
 * @property mixed $document
 * @property mixed $created_at
 * @property mixed $updated_at
 */

class GetHistoryResource extends JsonResource
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
            'uid'       => $this->uid,
            'document'  => new GetDocumentHistoryResource($this->document),
            'commit'    => $this->commit,
            'saved at'  => Carbon::parse($this->created_at)->toDateTimeString(),
            'by'        => new GetDocumentAuthorResource($this->document->updater)
        ];
    }
}
