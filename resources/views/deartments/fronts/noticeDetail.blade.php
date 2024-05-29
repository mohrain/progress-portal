@extends('deartments.fronts.view', ['title' => __('गृह')])

@section('frontContent')
<h5 class="text-theme-color fw-bold">
            {!!$information->name!!}

        </h5>
        {{-- <x-modal-image-view /> --}}
    <div class="border-top mt-2">
        {!!$information->description!!}
        {{-- {{$information->file}} --}}
    </div>
@endsection
