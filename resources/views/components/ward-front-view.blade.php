<div class="row">
    @foreach ($wards as $ward)
    <div class="col-12 col-sm-6 col-md-3 mb-4">
        <div class="border rounded shadow p-4 text-center">
            <a href="{{route('ward.front',$ward)}}">
                <figure class="mx-auto mb-3 rounded-circle overflow-hidden" style="width: 128px; height: 128px;">
                    <img
                        src="{{ $ward->logo ? asset('storage/' . $ward->logo) : asset('images/nep-gov-logo.png') }}"
                        alt="{{ $ward->name }}"
                        class="w-100 h-100 object-fit-fill">
                </figure>
            </a>
            <h3 class="h5 font-weight-bold">वडा नं. {{ $ward->name }}</h3>
        </div>
    </div>
    @endforeach
</div>