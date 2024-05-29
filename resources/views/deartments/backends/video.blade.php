@extends('deartments.backends.edit')

@section('departmentContent')
    <div class="card mt-2">
        <div class="card-body">
            <form action="{{ route('video.store', $department->slug) }}" method="POST" class="form"
                enctype="multipart/form-data">
                @csrf
                @isset($district->id)
                    @method('put')
                @endisset
                <input type="hidden" name="department_id" value="{{ $department->id }}" id="">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="input-name">नाम</label>
                            <input type="text" class="form-control" name="name" id="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="input-name">यु.आर.एल.</label>
                            <input type="text" class="form-control" name="url" id="">
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="input-name">थम्बनेल</label>
                            <input type="file" class="form-control" name="thumbnail" id="">
                        </div>

                    </div>
                    <div class="col-12">

                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-primary z-depth-0">सुरक्षित</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">


            <div class="card mt-2">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>क्र.स.</th>
                                <th>नाम</th>
                                <th>भिडिओ</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $video->name }}</td>
                                    <td>
                                        <a href="{{$video->url}}">
                                            <img src="{{ asset('storage') . '/' . $video->thumbnail }}" width="100px" alt="">
                                        </a>
                                    </td>

                                    <td>
                                        <form action="{{ route('video.delete', [$department->slug, $video->id]) }}"
                                            method="POST" onsubmit="return confirm('Are you sure ?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        {{-- <div class="col-md-6">
            <div class="card mt-2">
                <div class="card-body">
                    <form action="{{route('video.store',$department->slug)}}" method="POST" class="form">
                        @csrf
                        @isset($district->id)
                            @method('put')
                        @endisset
                        <input type="hidden" name="department_id" value="{{$department->id}}" id="">
                        <div class="form-group">
                            <label for="input-name"> नाम</label>
                            <input type="text" class="form-control" name="name" id="">
                        </div>
                        <div class="form-group">
                            <label for="input-name"> भिडियो (Youtube iframe)</label>
                            <input type="text" class="form-control" name="video" id="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success z-depth-0">सेभ गर्नुहोस्</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>क्र.स.</th>
                                <th>नाम</th>
                                <th>भिडियो</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$video->name}}</td>
                                    <td>
                                        {!!$video->video!!}
                                    </td>
                                    <td>
                                        <form action="{{route('video.delete',[$department->slug,$video->id])}}" method="POST" onsubmit="return confirm('Are you sure ?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
@push('styles')
    <style>
        iframe {
            height: 100px;
            width: 150px;
        }
    </style>
@endpush
