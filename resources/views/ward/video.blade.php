@extends('ward.ward-view')
@section('wardContent')
<div class="container-fluid">


    <section class="box mt-4">
        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">भिडिओ <i>( वडा नं. {{ $ward->name }})</i></div>
                <div>
                    <a href="{{ route('ward.video.create', $ward) }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
        <div class="box__body">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>क्र.स.</td>
                    <td>नाम</td>
                    <td>भिडिओ</td>
                    <td></td>
                </tr>

                @foreach ($videos as $video)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $video->name }}</td>
                    <td>
                        <a href="{{ $video->url }}" target="_blank">
                            <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="thumbnail" height="50px">
                        </a>
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('ward.video.edit', [$ward, $video]) }}"
                                class="btn btn-primary btn-sm mx-2">Edit</a>
                            <form action="{{ route('ward.video.delete', [$video]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('के तपाईँ पक्का हुनुहुन्छ?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </section>
</div>
@endsection