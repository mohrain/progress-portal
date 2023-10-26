<div class="d-flex gap-3">
    @foreach ($informationOfficers as $informationOfficer)
        @if ($informationOfficer->employee_id == 1)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 text-center">
                        <img src="{{ $informationOfficer->employee->profile ? asset('storage/' . $informationOfficer->employee->profile) : asset('assets/img/no-image.png') }}"
                            class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <a href="{{ route('employees.show', $informationOfficer->employee) }}" class="nav-link text-dark">
                            <div class="text-center py-2">
                                <h5 class="card-title">{{ $informationOfficer->employee->name }}</h5>
                                <div class="card-text"><small
                                        class="text-muted">{{ $informationOfficer->employee->designation }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
