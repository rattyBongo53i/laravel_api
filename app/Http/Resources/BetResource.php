<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'matchUuid' => $this->matchUuid,
            'home' => $this->home,
            'away' => $this->away,
            'league' => $this->league,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'is_live' => $this->is_live,
            'date' => $this->created_at->format('Y-m-d')
        ];
    }
}
