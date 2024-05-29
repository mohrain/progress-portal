@extends('deartments.fronts.view', ['title' => __('गृह')])

@section('frontContent')
<h5 class="text-theme-color fw-bold">
            {!!$activity->name!!}

        </h5>
        {{-- <x-modal-image-view /> --}}
    <div class="border-top mt-2">
        {!!$activity->description!!}
        {{-- {{$information->file}} --}}
    </div>
@endsection
