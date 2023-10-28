@extends('layouts.app', ['title' => __('ग्यालेरी')])

@section('content')
<div class="container-fluid mt--7">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box__header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="box__title">ग्यालेरी</div>
                        <div>
                            <a href="{{ route('album.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus mr-2"></i>नयाँ ग्यालेरी</a>
                        </div>
                    </div>
                </div>
                <div class="box__body">
                    <gallery-albums />
                </div>
            </div>
        </div>
        <a href="{{ route('album.create') }}" class="add-album-floating-btn"><i class="fa fa-plus"></i></a>
    </div>
</div>
@endsection

@push('styles')
<style>
    .add-album-floating-btn {
        position: fixed;
        right: 1.5rem;
        bottom: 1.5rem;
        height: 3rem;
        width: 3rem;
        border-radius: 50%;
        background: blue;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.1rem;
        color: #fff;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
        transition: all 150ms;
    }

    .add-album-floating-btn:hover {
        text-decoration: none;
        color: #fff;
        opacity: .8;
        box-shadow: 0 2px 10px rgb(0 0 0 / 0.5);
        transform: scale(1.1);
    }

</style>
@endpush
