@extends('layouts.app', ['title' => __('ग्यालेरी')])

@section('content')
<div class="container-fluid mt--7">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="box">
                <div class="box__header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="box__title">ग्यालेरी - {{ $album->name }}</div>
                            <div class="text-muted">
                                {{ $album->description }}
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('album.create') }}" class="btn btn-sm btn-primary">नयाँ ग्यालेरी</a>
                        </div>
                    </div>
                </div>
            </div>

                {{-- <div class="box__body"> --}}
                    <gallery-uploader :album="{{ $album }}"/>
                {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
