@extends('deartments.fronts.view', ['title' => __('गृह')])

@section('frontContent')
    {{-- <x-modal-image-view /> --}}
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="text-left" style="width: 100px">क्र.स.</th>
                <th>शीर्षक</th>
                <th style="width: 150px"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($department->information as $information)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $information->name }}</td>
                    <td title="Download">
                        <a href="{{ route('information.detail', [$department->slug, $information->id]) }}"
                            class="btn btn-warning">पढ्नुहोस&nbsp;<i class="fa fa-arrow-right"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
