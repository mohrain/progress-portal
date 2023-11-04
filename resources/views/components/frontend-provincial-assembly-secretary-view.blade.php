@foreach ($informationOfficers as $informationOfficer)
@if ($informationOfficer->employee_id == 1)
{{-- <div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4 text-center">
            <img src="{{ $informationOfficer->employee->profile ? asset('storage/' . $informationOfficer->employee->profile) : asset('assets/img/no-image.png') }}" class="img-fluid rounded-start" alt="...">
</div>
<div class="col-md-8">
    <a href="{{ route('employees.show', $informationOfficer->employee) }}" class="nav-link text-dark">
        <div class="text-center py-2">
            <b class="card-title">{{ $informationOfficer->employee->name }}</b>
            <div class="card-text"><small class="text-muted">{{ $informationOfficer->employee->designation }}</small>
            </div>
        </div>
    </a>
</div>
</div>
</div> --}}

<div class="officer-card mb-3">
    <div class="bg-pattern"></div>
    <div class="officer-card-content">
        <div class="officer-image">
            <a class="officer-image-wrap" href="{{ route('employees.show', $informationOfficer->employee) }}">
                <img src="{{ $informationOfficer->employee->profile ? asset('storage/' . $informationOfficer->employee->profile) : asset('assets/img/no-image.png') }}" alt="{{ $informationOfficer->employee->name }}">
            </a>
        </div>
        <a class="officer-info" href="{{ route('employees.show', $informationOfficer->employee) }}">
            <h4>{{ $informationOfficer->employee->name }}</h4>
            <div>{{ $informationOfficer->employee->designation }}</div>
        </a>
    </div>
</div>

@endif
@endforeach
