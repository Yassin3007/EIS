<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
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
            'id'=>$this->id??null,
            'uuid'=>$this->uuid,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'email'=>$this->email,
            'swift_code'=>$this->swift_code,
            'iban'=>$this->iban,
            'type'=>$this->type,
            'status'=>$this->status,
            'isVerified'=>$this->isVerified,
            'mobile'=>$this->mobile,
            'isVerified'=>$this->isVerified,
            'image'=>$this->image !== null ? 'https://host-in.s3.amazonaws.com'.$this->image : null,
            'country_id'=>$this->country_id,
            'country'=>$this->country??null,
            'properties_count'=>$this->owner_properties_count(),
            // 'properties'=>new PropertyResource($this->owner_properties())??null,
            // 'district'=>new DistrictResource($this->district),
        ];

    }
}
