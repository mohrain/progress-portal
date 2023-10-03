<?php

namespace App\Traits;

use Hashids;

trait Hashidable
{
    public function getRouteKey()
    {
        return Hashids::connection(get_called_class())->encode($this->getKey());
    }

    public function getHashIdAttribute()
    {
        return $this->getRouteKey();
    }
}
