<?php

namespace App\Http\Resources\HistoryResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $start_date
 * @property mixed $end_date
 */

class GetHistoryDateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'start date'=> $this->start_date,
            'end date'  => $this->end_date ?? 'not defined'
        ];
    }
}
