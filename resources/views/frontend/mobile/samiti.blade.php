@extends('frontend.layouts.app', ['title' => __('समिति')])
@section('content')
    <div class="container ">
        <a href="{{ url()->previous() }}"
            class="font-bold px-2 text-decoration-none text-danger d-flex align-items-center gap-2 ">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
            </svg> <span class="font-bold fs-4">समिति </span>
        </a>
        <ul class=" list-unstyled bg-white p-3" aria-labelledby="navbarDropdown">

            @foreach (\App\Models\Committee::get() as $committee)
                <li class="border-bottom mb-1"><a class="text-secondary fs-5 "
                        href="{{ route('frontend.committees.show', $committee->slug) }}">{{ $committee->name }}</a></li>
            @endforeach

        </ul>
    </div>
@endsection
