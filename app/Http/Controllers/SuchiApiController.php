<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuchiListResource;
use App\Suchi;
use Illuminate\Http\Request;

class SuchiApiController extends Controller
{
    public function registered()
    {
        $suchis = Suchi::with('suchiType')->registeredOnly()->latest()->paginate();
        return SuchiListResource::collection($suchis);
    }
}
