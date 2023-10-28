<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
{
    public static $wrap = false;

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
            'album_id' => $this->album_id,
            'url' => $this->getUrl(),
            'name' => $this->name,
            'format' => pathinfo($this->path, PATHINFO_EXTENSION),
            'size' => [
                'raw' => $this->size,
                'mb' => $this->getSizeInMb($this->size)
            ],
            'created_at' => new DateTimeResource($this->created_at)
        ];
    }

    private function getSizeInMb($size)
    {
        $sizeInMb =  ((int) $size) / 1048576;

        if ($sizeInMb == (int) $sizeInMb) {
            $formattedSize = (int) $sizeInMb . " MB";
        } else {
            $formattedSize = number_format($sizeInMb, 2) . " MB";
        }

        return $formattedSize;
    }
}
