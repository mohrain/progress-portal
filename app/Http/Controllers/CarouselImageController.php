<?php

namespace App\Http\Controllers;

use App\CarouselImage;
use App\Http\Requests\StoreCarouselImageRequest;
use App\Http\Requests\UpdateCarouselImageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarouselImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carouselImages = CarouselImage::latest()->paginate(50);
        return view('carousel-images.index', compact('carouselImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CarouselImage $carouselImage = null)
    {
        if (!$carouselImage) {
            $carouselImage = new CarouselImage();
        }
        return view('carousel-images.create', compact('carouselImage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarouselImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarouselImageRequest $request)
    {
        $data = $request->validated();
        // return $data;
        if ($request->file('image')) {
            $data['image'] = Storage::putFile('carousel-image', $request->file('image'));
        }
        CarouselImage::create($data);
        return redirect()
            ->route('carousel-images.index')
            ->with('success', 'Carousel Images Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    public function show(CarouselImage $carouselImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    public function edit(CarouselImage $carouselImage)
    {
        return $this->create($carouselImage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarouselImageRequest  $request
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarouselImageRequest $request, CarouselImage $carouselImage)
    {
        $data = $request->validated();

        if ($request->file('image')) {
            if ($carouselImage->image) {
                Storage::delete($carouselImage->image);
            }
            $data['image'] = Storage::putFile('carousel-image', $request->file('image'));
        }

        $carouselImage->update($data);
        return redirect()
            ->route('carousel-images.index')
            ->with('success', 'Carousel Images Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarouselImage $carouselImage)
    {
        Storage::delete($carouselImage->image);
        $carouselImage->delete();
        return redirect()
            ->back()
            ->with('success', 'Carousel Images Deleted');
    }
}
