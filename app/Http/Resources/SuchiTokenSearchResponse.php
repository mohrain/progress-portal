<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuchiTokenSearchResponse extends JsonResource
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
            'id' => $this->id,
            'hash_id' => $this->hash_id,
            'token_no' => $this->token_no,
            'name' => $this->name,
            'contact_person' => $this->contact_person,

        ];
    }
}
