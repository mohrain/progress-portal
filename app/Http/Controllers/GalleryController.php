<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Http\Resources\PhotoResource;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = Album::withCount('photos')
            ->with('previewPhoto')
            ->latest()
            ->get();

        return view('frontend.gallery.gallery', [
            'albums' => $albums
        ]);
    }

    public function show(Album $album)
    {
        return view('frontend.gallery.view-album', [
            'album' => $album
        ]);
    }

    public function getAlbums(): JsonResource
    {
        $albumsCount = Album::count();
        $albums = Album::withCount('photos')
            ->with(['photos' => function ($q) use ($albumsCount) {
                $q->limit(4 * $albumsCount);
            }])
            ->latest()
            ->get();

        return AlbumResource::collection($albums);
    }

    public function getPhotos(Album $album): ResourceCollection
    {
        $photos = $album->photos()->latest('id')->get();

        return PhotoResource::collection($photos);
    }
}
