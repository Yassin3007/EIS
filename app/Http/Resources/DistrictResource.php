<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DistrictResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return new GovernmentResource($this->government());
        return  [
            'id'=>$this->id,
            'name'=>$this->name,
            'name_ar'=>$this->name_ar,
            'name_en'=>$this->name_en,
            'image'=>$this->image!=null ? $this->image : 'https://picsum.photos/200/300',
            'government_id'=>$this->government_id,
            'government'=>$this->government??null,
            'country_id'=>$this->government->country->id??null,
            'country'=>$this->government->country??null,
        ];

    }
}
