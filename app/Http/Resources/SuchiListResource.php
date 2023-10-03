<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuchiListResource extends JsonResource
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
            'is_registered' => $this->isRegistered(),
            'full_reg_no' => $this->full_reg_no,
            'application_date' => $this->application_date,
            'reg_date' => $this->reg_date,
            'name' => $this->name,
            'suchi_type' => $this->suchiType->title,
        ];
    }
}
