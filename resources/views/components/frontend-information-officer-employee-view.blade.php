<div class="d-flex gap-3">
    @foreach ($informationOfficers as $informationOfficer)
        @if ($informationOfficer->employee_id == 1)
            @php
                continue;
            @endphp
        @endif
        <div>
            <div class="fw-bold text-center">{{ $informationOfficer->EmployeeDesignation->name }}</div>
            <hr>
            <div class="card" style="width: 8rem;">
                <img src="{{ $informationOfficer->employee->profile ? asset('storage/' . $informationOfficer->employee->profile) : asset('assets/img/no-image.png') }}"
                    class="card-img-top" alt="...">
                <div class="text-center">
                    <a href="{{ route('employees.show', $informationOfficer->employee) }}" class="nav-link text-dark">
                        <b class="card-title text-dark fs-6">{{ $informationOfficer->employee->name }}</b>
                        <div>
                            <small class="text-muted">{{ $informationOfficer->employee->designation }}</small>
                        </div>
                        <div>
                            <small class="text-muted">{{ $informationOfficer->employee->mobile }}</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
