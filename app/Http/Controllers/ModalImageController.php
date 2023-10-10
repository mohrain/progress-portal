<?php

namespace App\Http\Controllers;

use App\ModalImage;
use App\Http\Requests\StoreModalImageRequest;
use App\Http\Requests\UpdateModalImageRequest;
use Illuminate\Support\Facades\Storage;

class ModalImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalImages = ModalImage::latest()->paginate(50);
        return view('modal-images.index', compact('modalImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ModalImage $modalImage = null)
    {
        if (!$modalImage) {
            $modalImage = new ModalImage();
        }
        return view('modal-images.create', compact('modalImage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModalImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModalImageRequest $request)
    {
        $data = $request->validated();
        // return $data;
        if ($request->file('image')) {
            $data['image'] = Storage::putFile('modal-image', $request->file('image'));
        }
        ModalImage::create($data);
        return redirect()
            ->route('modal-images.index')
            ->with('success', 'Modal Images Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModalImage  $modalImage
     * @return \Illuminate\Http\Response
     */
    public function show(ModalImage $modalImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModalImage  $modalImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ModalImage $modalImage)
    {
        return $this->create($modalImage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModalImageRequest  $request
     * @param  \App\ModalImage  $modalImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModalImageRequest $request, ModalImage $modalImage)
    {
        $data = $request->validated();

        if ($request->file('image')) {
            if ($modalImage->image) {
                Storage::delete($modalImage->image);
            }
            $data['image'] = Storage::putFile('modal-image', $request->file('image'));
        }

        $modalImage->update($data);
        return redirect()
            ->route('modal-images.index')
            ->with('success', 'Modal Images Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModalImage  $modalImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModalImage $modalImage)
    {
        Storage::delete($modalImage->image);
        $modalImage->delete();
        return redirect()
            ->back()
            ->with('success', 'Modal Images Deleted');
    }
}
