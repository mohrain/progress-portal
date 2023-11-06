@extends('layouts.app')
@push('styles')
    <style>
        select {
            height: calc(1.5em + 1rem + 4px) !important;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="my-4"></div>

        <form action="{{ route('settings.sync') }}" method="POST" class="form font-noto">
            @csrf

            @component('settings.group', [
                'title' => 'प्रत्यक्ष प्रसारण',
                'description' => 'प्रत्यक्ष प्रसारणको Youtube Link',
            ])
                <div>
                    @component('settings.input', [
                        'label' => 'प्रत्यक्ष प्रसारण',
                        'name' => 'live',
                        'description' => 'Youtube Link',
                    ])
                    @endcomponent
                </div>
            @endcomponent

        </form>
    </div>

@endsection
