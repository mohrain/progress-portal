@foreach ($officeBearers as $officeBearer)
    <div class="card text-bg-light mb-3">
        <div class="row g-0">
            <div class="col-md-4 text-center">
                <img src="{{ $officeBearer->member->profile ? asset('storage/' . $officeBearer->member->profile) : asset('assets/img/no-image.png') }}"
                    class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <a href="{{ route('members.show', $officeBearer->member) }}" class="nav-link text-dark">
                    <div class="text-center py-2">
                        <b class="card-title">{{ $officeBearer->member->name }}</b>
                        <div class="card-text"><small
                                class="text-muted">{{ $officeBearer->designation == true ? 'सम्माननीय सभामुख' : 'माननीय उपसभामुख' }}</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endforeach
