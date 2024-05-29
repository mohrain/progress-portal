@extends('deartments.fronts.view', ['title' => __('गृह')])

@section('frontContent')
    {{-- <x-modal-image-view /> --}}
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="text-left" style="width: 100px">क्र.स.</th>
                <th>शीर्षक</th>
                <th>अडियो</th>
                {{-- <th style="width: 150px"></th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($department->audio as $audio)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $audio->name }}</td>
                    <td>
                        <audio controls>
                            <source src="{{asset('storage').'/'.$audio->audio}}" type="audio/mpeg">
                            </audio>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
