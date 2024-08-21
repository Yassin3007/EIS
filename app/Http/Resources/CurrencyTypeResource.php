<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyTypeResource extends JsonResource
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
            'abbreviation'=>$this->abbreviation,
            'abbreviation_ar'=>$this->abbreviation_ar,
            'abbreviation_en'=>$this->abbreviation_en,
        ];

    }
}
