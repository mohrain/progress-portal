@extends('ward.ward-view')
@section('wardContent')
<section class="box mt-4">
    <div class="box__header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="box__title">प्रकाशनहरु/डाउनलोडस् <i>(वडा नं.{{$ward->name}})</i></div>
            <div>
                <a href="{{ route('ward.downloads.create', $ward) }}" class="btn btn-primary">Add New</a>
            </div>
        </div>
    </div>
    <div class="box__body">
        <table class="table table-bordered table-hover">
            <tr>
                <td>क्र स</td>
                <td>शीर्षक</td>
                <td></td>
                <td></td>
            </tr>
            @foreach ($ward->downloads as $download)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$download->title}}</td>
                <td><a href="{{ $download->fileUrl() }}" target="_blank">View/Download</a></td>
                <td>
                    <a href="{{ route('ward.downloads.edit', [$ward, $download]) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('ward.destroy', $download) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</section>

@endsection