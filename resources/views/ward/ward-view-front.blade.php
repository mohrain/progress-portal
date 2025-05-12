@extends('frontend.layouts.app', ['title' => __('वडा नं')])
@section('content')
<div>
    <div class="container">
        <div class="col-md-8 bg-white p-3">
            <h5 class="sub-heading">वडा नं {{$ward->name}} को विवरण</h5>

            <div>
                <h5 class="sub-heading-arrow">परिचय</h5>
            </div>

            <p>
                {{$ward->description}}
            </p>


        </div>


    </div>

</div>
@push('styles')
<style>
    .sub-heading {
        font-size: 1.5rem;
        color: #982121;
        /* Lighter grey */
        font-weight: 600;
        margin-bottom: 0.75rem;
        padding-left: 10px;
        border-left: 4px solid #982121;
    }

    .sub-heading-alt {
        font-size: 1.3rem;
        /* Slightly larger font size */
        color: #982121;
        /* Same color */
        font-weight: 500;
        /* Slightly lighter weight */
        margin-bottom: 1rem;
        /* More spacing at the bottom */
        padding-left: 12px;
        /* A bit more padding on the left */
        border-left: 6px solid #982121;
        /* Thicker border for more emphasis */
        font-style: italic;
        /* Add italic style for differentiation */
    }

    .sub-heading-arrow {
        font-size: 1.2rem;
        color: #982121;
        /* Lighter grey */
        font-weight: 600;
        margin-bottom: 1rem;
        padding-left: 20px;
        position: relative;
    }
</style>
@endpush
@endsection