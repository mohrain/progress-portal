@extends('ward.ward-view')

@section('wardContent')
<div class="card mt-2">
    <div class="box__header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="box__title">वडाको काम ,कर्तव्य र अधिकार <i>( वडा नं {{ $ward->ward_id ? $ward->ward->name . '/' . $ward->name : $ward->name }})</i></div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('ward.work.update', $ward->id) }}" method="POST" class="form">
            @csrf
            @isset($ward->id)
            @method('put')
            @endisset


            <div class="form-group">
                <textarea name="work_duty" class="form-control" id="summernote" cols="30" rows="10" placeholder="Text Message">{{ $ward->work_duty }}</textarea>
            </div>

            <div class="form-group float-right">
                <button type="submit" class="btn btn-primary z-depth-0">सुरक्षित</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#employee_id').each(function() {
            $(this).select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });
        });
    });
</script>
@endpush