@extends('ward.ward-view')

@section('wardContent')
<div class="container-fluid">
    <section class="box">
        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">अडियो <i>({{ $ward->name }})</i></div>
                <div>
                    <a href="{{ route('ward.audio.create', $ward) }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
        <div class="box__body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>क्र.स</th>
                    <th>नाम</th>
                    <th>अडियो</th>
                    <th>Action</th>
                </tr>

                @foreach ($audios as $audio)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $audio->name }}</td>
                        <td>
                            <audio controls>
                                <source src="{{ asset('storage/' . $audio->audio) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('ward.audio.edit', [$ward, $audio]) }}" class="btn btn-primary btn-sm mx-2">Edit</a>
                                <form action="{{ route('ward.audio.delete', $audio) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('के तपाई सुनिचित हुनुहुन्छ ?')">
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
