<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PhotoController extends Controller
{
    private $storageDirectory = 'photos';

    public function index(Album $album): View
    {
        return view('gallery.albums-photos', [
            'album' => $album
        ]);
    }

    public function getPhotos(Album $album): ResourceCollection
    {
        $photos = $album->photos()->latest('id')->get();

        return PhotoResource::collection($photos);
    }

    public function store(Album $album, Request $request): JsonResource
    {
        try {
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $uniqueFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '_' . uniqid() . '.' . $extension;

            $path = Storage::putFileAs(
                $this->storageDirectory,
                $file,
                $uniqueFileName
            );

            $photo = $album->photos()->create([
                'name' => $uniqueFileName,
                'path' => $path,
                'size' => $file->getSize()
            ]);

            return new PhotoResource($photo);
        } catch (\Throwable $th) {
            sleep(5);
            if (isset($path)) {
                Storage::delete($path);
            }
            throw $th;
        }
    }

    public function destroy(Photo $photo)
    {
        Storage::delete($photo->path);
        $photo->delete();

        return response()->json(['message' => 'success'], 200);
    }
}
