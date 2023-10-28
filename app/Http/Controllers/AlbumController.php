<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        return view('gallery.albums');
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

    public function create()
    {
        return view('gallery.crete-album');
    }

    public function store(Request $request)
    {
        $album = Album::create($request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]));

        return redirect()->route('album.photos.index', $album);
    }

    public function destroy(Album $album)
    {
        $album->loadMissing('photos');
        $photoPaths = $album->photos->pluck('path');

        $album->photos()->delete();
        $album->delete();
        Storage::delete($photoPaths->toArray());

        return response()->json([], 204);
    }
}
