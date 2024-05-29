@extends('deartments.fronts.view', ['title' => __('गृह')])

@section('frontContent')
    {{-- <x-modal-image-view /> --}}
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="text-left" style="width: 100px">क्र.स.</th>
                <th>शीर्षक</th>
                <th>भिडिओ</th>
                {{-- <th style="width: 150px"></th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($department->video as $video)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $video->name }}</td>
                    <td>
                        <a href="{{$video->url}}">
                            <img src="{{ asset('storage') . '/' . $video->thumbnail }}" width="100px" alt="">
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('styles')
    <style>
        iframe{
            height: 200px;
            width: 400px;
        }
    </style>
@endpush
