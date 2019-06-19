<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tanks_ReadingsResource extends JsonResource
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
            'start reading' => $this->start_reading,
            'close reading' => $this->close_reading,
            'tank id' => $this->tank_id,
            'user_id' => $this->user_id
        ];
    }
}