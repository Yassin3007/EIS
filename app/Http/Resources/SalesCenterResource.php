<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesCenterResource extends JsonResource
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
            'location'=>$this->title,
            'address'=>$this->content,
            // 'name_en'=>$this->name_en,
            // 'image'=>$this->image,
            // 'district'=>new DistrictResource($this->district),
        ];

    }
}
