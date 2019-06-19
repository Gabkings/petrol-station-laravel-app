<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PumpsResource extends JsonResource
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
            'pump name' => $this->start_reading,
            'tank id' => $this->tank_id,
            'unit id' => $this->unit_id
        ];
    }
}