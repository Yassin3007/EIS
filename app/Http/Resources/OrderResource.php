<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'type'=>$this->type,
            'status'=>$this->status,
            'price'=>$this->price,
            'from_date'=>$this->from_date,
            'to_date'=>$this->to_date,
            'from_time'=>$this->from_time,
            'to_time'=>$this->to_time,
            'num_of_nights'=>$this->num_of_nights,
            'user_id'=>$this->user_id,
            'user'=>$this->user,
            'property_id'=>$this->property_id,
            'property'=>$this->property,
        ];

    }
}
