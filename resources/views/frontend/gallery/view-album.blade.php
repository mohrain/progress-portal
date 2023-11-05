@extends('frontend.layouts.app', ['title' => __('फोटो संग्रह')])

@section('content')
<div id="app">
    <div class="container">
        <frontend-view-album :album="{{ $album }}" />
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endpush
