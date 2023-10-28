<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'photos_count' => $this->photos_count,
            'preview_photos' => count($this->previewPhotos)
                ? $this->previewPhotos->map(fn ($photo) => $photo->getUrl())
                : ['https://innovasolutions.co.uk/wp-content/themes/innova-solutions-golf/resources/images/fallback-thumbnail.jpg']
        ];
    }
}
