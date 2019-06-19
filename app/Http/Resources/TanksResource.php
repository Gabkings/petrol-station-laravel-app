<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TanksResource extends JsonResource
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
            'name' => $this->tank_name,
            'fuel type id' => $this->fuel_type_id
        ];
    }
}
