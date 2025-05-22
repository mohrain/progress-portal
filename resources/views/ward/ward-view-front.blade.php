@extends('frontend.layouts.app', ['title' => __('वडा नं')])
@section('content')
<div>
    <div class="container pb-5">
        <div class="row">
            <div class="col-md-9 bg-white p-3">

                <div class="title">
                    <h3 class="text-theme-color fw-bold">वडा नं {{$ward->name}} को विवरण</h3>
                </div>

                <div class="mt-3">
                    <h5 class="sub-heading-arrow">परिचय</h5>

                    {{$ward->description}}
                </div>

                <div class="mt-3">
                    <h5 class="sub-heading-arrow">काम ,कर्तव्य र अधिकार </h5>

                    <div class="px-3">
                        {!!$ward->work_duty!!}
                    </div>
                </div>

                <div class="mt-3">
                    <h5 class="sub-heading-arrow">सूचना र प्रकासन</h5>

                    <div class="row">
                        <div class="col-md">
                            <x-news-front-view :news="$news" />
                        </div>
                        <div class="col-md">

                            <x-download-view :downloads="$downloads" />
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-3">
                <div>
                    <x-members-view :members="$members" />
                </div>

                <div>
                    <x-employee-view :employees="$employees" />
                </div>

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

        .sub-heading-arrow::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            border-left: 15px solid #982121;
            /* Arrow shaft */
            border-top: 10px solid transparent;
            /* Arrow head */
            border-bottom: 10px solid transparent;
            /* Arrow head */
        }
    </style>
    @endpush
    @endsection