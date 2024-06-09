@extends('deartments.backends.edit')

@section('departmentContent')
    <div class="card mt-2">
        {{-- @if ($activity->id)
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#noticeExample").modal('show');
                    })
                </script>
            @endpush
        @endif --}}

        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">गतिविधि <i>({{$department->name}})</i></div>
               </div>
        </div>
        <div class="card-body">
            <form action="{{$activity->id ? route('department.activity.update',[$department->slug,$activity->id]) : route('department.activity.store') }}" method="POST" enctype="multipart/form-data" class="form">
                        @csrf
                        @isset($activity->id)
                            @method('put')
                        @endisset
                        <input type="hidden" value="{{ $department->id }}" name="department_id">
                        <div class="form-group">
                            <label for="input-name">शीर्षक</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{old('name',$activity->name)}}" id="">
                            <x-invalid-feedback field="name" />
                        </div>

                        <div class="form-group">
                            <label for="input-name">विवरण</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="summernote" cols="30" rows="10"
                                placeholder="Text Message">{{old('description',$activity->description)}}</textarea>
                                <x-invalid-feedback field="description" />
                        </div>

                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-primary z-depth-0">सुरक्षित</button>
                        </div>
                    </form>

        </div>
    </div>
@endsection
