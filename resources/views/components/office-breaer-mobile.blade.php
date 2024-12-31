<div class="mt-3 d-flex gap-3">
    @foreach ($officeBearers as $officeBearer)
        <div class="mb-3 mx-1 d-inline-flex bg-white p-2">
            <a target="_blank" href="{{ route('members.show', $officeBearer->member) }}">
                <div class="text-center">

                    <div class="d-flex justify-content-center">
                        <figure style="height: 60px; width:60px ">
                            <img src="{{ $officeBearer->member->profile ? asset('storage/' . $officeBearer->member->profile) : asset('assets/img/no-image.png') }}"
                                alt="{{ $officeBearer->member->name }}" style="height: 60px; width:60px " />
                        </figure>
                    </div>
                    <a class="officer-info" href="{{ route('members.show', $officeBearer->member) }}">
                        <h5>{{ $officeBearer->member->name }}</h5>
                        <div class="text-secondary">
                            {{ $officeBearer->designation == true ? 'माननीय सभामुख' : 'माननीय उपसभामुख' }}</div>
                    </a>
                </div>
            </a>
        </div>
    @endforeach


    @foreach ($informationOfficers as $informationOfficer)
        @if ($informationOfficer->employee_id == 1)
            <div class="mb-3 d-inline-flex bg-white p-2 mx-1">

                <a target="_blank" href="{{ route('employees.show', $informationOfficer->employee) }}">
                    <div class="text-center">

                        <div class="d-flex justify-content-center">
                            <figure style="height: 60px; width:60px ">
                                <img src="{{ $informationOfficer->employee->profile ? asset('storage/' . $informationOfficer->employee->profile) : asset('assets/img/no-image.png') }}"
                                    alt="{{ $informationOfficer->employee->name }}"style="height: 60px; width:60px " />
                            </figure>
                        </div>
                        <a class="officer-info" href="{{ route('employees.show', $informationOfficer->employee) }}">
                            <h5>{{ $informationOfficer->employee->name }}</h5>
                            <div class="text-secondary">
                                {{ $informationOfficer->employee->designation }}</div>
                        </a>
                    </div>
                </a>
            </div>
        @endif
    @endforeach




    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
</div>
