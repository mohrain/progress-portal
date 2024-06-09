@extends('deartments.backends.edit')

@section('departmentContent')
<div class="card mt-2">
    <div class="box__header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="box__title"> काम, कर्तव्य र अधिकार <i>({{$department->name}})</i></div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('department.work.update',$department->id)}}" method="POST" class="form">
            @csrf
                @method('put')
            <div class="form-group">
                {{-- <label for="input-name">काम, कर्तव्य र अधिकार</label> --}}
                <textarea name="work" class="form-control" id="summernote" cols="30" rows="10" placeholder="Text Message">{{$department->work}}</textarea>
            </div>

            <div class="form-group float-right">
                <button type="submit" class="btn btn-info z-depth-0">सुरक्षित</button>
            </div>
        </form>
    </div>
</div>
@endsection
