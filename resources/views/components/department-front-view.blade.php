<div class="row">
    @foreach ($departments as $department)
    <div class="col-12 col-sm-6 col-md-3 mb-4">
        <div class="border rounded shadow p-4 text-center">
            <a href="{{route('department.introFront',$department->slug)}}">
                <figure class="mx-auto mb-3 rounded-circle overflow-hidden" style="width: 128px; height: 128px;">
                    <img
                        src="{{ $department->image ? asset('storage/' . $department->image) : asset('images/nep-gov-logo.png') }}"
                        alt="{{ $department->name }}"
                        class="w-100 h-100 object-fit-cover">
                </figure>
            </a>
            <h3 class="h5 font-weight-bold">{{ $department->name }}</h3>
        </div>
    </div>
    @endforeach
</div>