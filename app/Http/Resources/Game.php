<?php

namespace App\Http\Resources;

use App\Http\Resources\FrameCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class Game extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'date' => $this->created_at->toDateTimeString(),
            'frames' => new FrameCollection($this->frames),
            'score' => $this->score,
        ];
    }
}
