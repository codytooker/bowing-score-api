<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Frame extends JsonResource
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
            'number' => $this->number,
            'throw_1' => $this->throw_1,
            'throw_2' => $this->throw_2,
            'throw_3' => $this->throw_3,
        ];
    }
}
