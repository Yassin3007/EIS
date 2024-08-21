<?php

namespace App\Http\Resources;

use App\Models\LeadPhones;
use Illuminate\Http\Resources\Json\JsonResource;


class SmsConfigurationResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->name,
            'user_name'     => $this->user_name,
            'password'      => $this->password,
            'sender_name'   => $this->sender_name,
            'url'           => $this->url,
        ];
    }
}
