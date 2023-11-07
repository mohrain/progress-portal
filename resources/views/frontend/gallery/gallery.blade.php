@extends('frontend.layouts.app', ['title' => __('फोटो संग्रह')])

@section('content')
<div id="app">
    <div class="container">
        <div class="box">
            <div class="box__header">
                <h1 class="box__title">Gallery</h1>
            </div>
            <div class="box__body">
                <frontend-albums />
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endpush
