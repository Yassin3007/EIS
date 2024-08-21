<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrokerResource extends JsonResource
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
            'country'=>$this->country,
            'properties_count'=>$this->broker_properties_count(),
            // 'properties'=>new PropertyResource($this->broker_properties()),

            // 'district'=>new DistrictResource($this->district),
        ];

    }
}
