@extends('deartments.backends.edit')

@section('departmentContent')
    <div class="card mt-2">
        @if ($publication->id)
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#noticeExample").modal('show');
                    })
                </script>
            @endpush
        @endif

        {{-- <div class="modal fade bd-example-modal-lg" id="noticeExample" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-2">
                    <form action="{{$publication->id ? route('department.activity.update',[$department->slug,$publication->id]) : route('department.publication.store') }}" method="POST" enctype="multipart/form-data" class="form">
                        @csrf
                        @isset($publication->id)
                            @method('put')
                        @endisset
                        <input type="hidden" value="{{ $department->id }}" name="department_id">
                        <div class="form-group">
                            <label for="input-name">शीर्षक</label>
                            <input type="text" class="form-control" name="name" value="{{old('name',$publication->name)}}" id="">
                        </div>

                        <div class="form-group">
                            <label for="input-name">फाइल</label>
                            <input type="file" class="form-control" name="file" value="{{old('file',$publication->file)}}" id="">
                        </div>

                        <div class="form-group">
                            <label for="input-name">विवरण</label>
                            <textarea name="description" class="form-control" id="summernote" cols="30" rows="10"
                                placeholder="Text Message">{{old('description',$publication->description)}}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success z-depth-0">{{$publication->id ? 'अपडेट' : 'सेभ'}}  गर्नुहोस्</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">प्रकाशनहरु/डाउनलोडस् <i>({{ $department->name }})</i></div>
                <a href="{{route('department.publications.create',$department->slug)}}" class="btn btn-primary">प्रकाशन थप्नुहोस</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>शीर्षक</th>
                        <th>कार्य</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publications as $publication)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $publication->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('department.publication.edit', [$department->slug, $publication->id]) }}"
                                        class="btn btn-warning">Edit</a>

                                    <form action="{{route('department.publication.delete',$publication->id)}}" method="POST" onsubmit="return confirm('Are you sure ?')">
                                            @csrf

                                            @method('delete')
                                            <button class="
                                            btn btn-danger ml-2" type="submit">Delete</button>
                                        </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
