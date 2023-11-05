@extends('frontend.layouts.app', ['title' => __($title)])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="frontend-title">
                        {{ $title }}
                        <hr>
                    </div>
                    <div class="mb-3">
                        <x-frontend.committee-menu :committee="$committee" />
                    </div>
                    <section>
                        <div class="bg-white border rounded-1 p-3 mb-3">
                            <form {{ route('frontend.committees.notices', $committee->slug) }} class="row" method="GET">
                                <div class="col-md-3 text-center">
                                    <div class="form-group">
                                        <input type="text" name="start_date" id="start_date" class="form-control nepali-date-picker" value="{{ request('start_date') }}" readonly="true" placeholder="शुरु मिती">
                                    </div>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="form-group">
                                        <input type="text" name="end_date" id="end_date" class="form-control nepali-date-picker" value="{{ request('end_date') }}" readonly="true" placeholder="अन्त्य मिति ">
                                    </div>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="form-group">
                                        <input type="search" name="keywords" class="form-control" value="{{ request('keyword') }}" placeholder="समिति सूचना खोज्नुहोस्">
                                    </div>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="form-group">
                                        <button type="submit" style="background-color:#0054a6 !important" class="wd-100 btn btn-primary btn-info bg-blue" onclick="submit()"><i class="fa fa-search"></i> खोजी गर्नुहोस्</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table class="table table-bordered bg-white">
                            <tr>
                                <td>क्र स</td>
                                <td>शीर्षक</td>
                                <td></td>
                            </tr>
                            @foreach ($downloads as $download)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $download->title }}</td>
                                <td>
                                    <a href="{{ $download->fileUrl() }}" class="btn btn-primary btn-sm" target="_blank">पढ्नुहोस्<i class="fa fa-arrow-right fa-fw"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <x-frontend.committee-chairman :committee="$committee" />
        </div>
    </div>
</div>
@endsection
