@extends('layouts.app', ['title' => __('ग्यालेरी')])

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box" style="max-width: 800px;">
                <div class="box__header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="box__title">भिडियो ग्यालरी</div>
                        <div>
                            <a href="{{ route('videos.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus mr-2"></i>नयाँ</a>
                        </div>
                    </div>
                </div>

                <div class="box__body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td>क्र स</td>
                            <td>शीर्षक</td>
                            <td></td>
                        </tr>
                        @foreach ($videos as $video)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$video->title}}</td>
                            <td>
                                <a href="{{ route('videos.edit', [$video]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
