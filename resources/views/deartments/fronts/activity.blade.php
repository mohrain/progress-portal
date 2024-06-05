@extends('deartments.fronts.view', ['title' => __('गृह')])

@section('frontContent')
    {{-- <x-modal-image-view /> --}}
    <div class="bg-white border rounded-1 p-3 mb-3">
        <form http:="" 127.0.0.1:8000="" committees="" vathhayana-tatha-parathasha-samata="" notices="" class="row"
            method="GET">
            <div class="col-md-3 text-center">
                <div class="form-group">
                    <input type="text" name="start_date" id="start_date"
                        class="form-control nepali-date-picker ndp-nepali-calendar" value="{{ Request::get('start_date') }}"
                        readonly="true" placeholder="शुरु मिती" autocomplete="off">
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="form-group">
                    <input type="text" name="end_date" id="end_date"
                        class="form-control nepali-date-picker ndp-nepali-calendar" value="{{ Request::get('end_date') }}"
                        readonly="true" placeholder="अन्त्य मिति " autocomplete="off">
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="form-group">
                    <input type="search" name="keywords" class="form-control" value="{{ Request::get('keywords') }}"
                        placeholder="गतिबिधि खोज्नुहोस्">
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="form-group">
                    <button type="submit" style="background-color:#0054a6 !important"
                        class="wd-100 btn btn-primary btn-info bg-blue" onclick="submit()"><svg
                            class="svg-inline--fa fa-magnifying-glass" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                            </path>
                        </svg><!-- <i class="fa fa-search"></i> Font Awesome fontawesome.com --> खोजी गर्नुहोस्</button>
                </div>
            </div>
        </form>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="text-left" style="width: 100px">क्र.स.</th>
                <th>शीर्षक</th>
                <th style="width: 150px"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $activity->name }}</td>
                    <td title="Download">
                        <a href="{{ route('activity.detail', [$department->slug, $activity->id]) }}"
                            class="btn btn-warning">पढ्नुहोस&nbsp;<i class="fa fa-arrow-right"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
