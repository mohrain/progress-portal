@extends('frontend.layouts.app', ['title' => __('भिडियो संग्रह')])

@section('content')
<div id="app">
    <div class="container">
        <frontend-video-gallery :videos="{{ $videos }}" />
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endpush
