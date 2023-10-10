<?php

namespace App\Http\Controllers;

use App\CarouselImage;
use App\Http\Requests\StoreCarouselImageRequest;
use App\Http\Requests\UpdateCarouselImageRequest;

class CarouselImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarouselImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarouselImageRequest $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarouselImage  $carouselImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarouselImage $carouselImage)
    {
        //
    }
}
