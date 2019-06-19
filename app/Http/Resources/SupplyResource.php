<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplyResource extends JsonResource
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
            'order id' => $this->purchase_order_id,
            'invoice' => $this->invoice,
            'amount' => $this->amount,
            'supply status' => $this->supply_status,
            'user id' => $this->user_id,
            'supplier id' => $this->supplier_id
        ];
    }
}
