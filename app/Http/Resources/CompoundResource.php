<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompoundResource extends JsonResource
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
            'name'=>$this->name,
            'name_ar'=>$this->name_ar,
            'name_en'=>$this->name_en,
            'image'=>$this->image!=null ? $this->image : 'https://picsum.photos/200/300',
            'district_id'=>$this->district_id,
            'district'=>$this->district??null,
            'government_id'=>$this->government_id,
            'government'=>$this->government??null,
            'country_id'=>$this->country_id,
            'country'=>$this->country??null,
            
        ];

    }
}
