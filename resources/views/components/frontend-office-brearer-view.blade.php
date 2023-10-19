@foreach ($officeBearers as $officeBearer)
    <div class="card text-bg-light mb-3">
        <div class="row g-0">
            <div class="col-md-4 text-center">
                <img src="{{ $officeBearer->member->profile ? asset('storage/' . $officeBearer->member->profile) : asset('assets/img/no-image.png') }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="text-center py-2">
                    <h5 class="card-title">{{ $officeBearer->member->name }}</h5>
                    <div class="card-text"><small class="text-muted">{{ $officeBearer->designation == true ? 'सभामुख' : 'उप सभामुख' }}</small></div>
                </div>
            </div>
        </div>
    </div>
@endforeach

