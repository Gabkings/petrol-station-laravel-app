<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Purchase_OrderResource extends JsonResource
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
            'name' => $this->fuel_name,
            'volume' => $this->fuel_volume,
            'userid' => $this->user_id,
            'supplier id' => $this->supplier_id
        ];
    }
}
