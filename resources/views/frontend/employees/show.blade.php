@extends('frontend.layouts.app', ['title' => __($employee->name)])
@section('content')
    <style>
        .table {
            border-collapse: separate;
            border-spacing: 16px 12px;
            font-size: 16px;
        }
    </style>
    <div class="container">
        <div class="row g-3">
            <div class="col-md-3 box">
                <div class="pt-5 text-center">
                    <img src="{{ $employee->profile ? asset('storage/' . $employee->profile) : asset('assets/img/no-image.png') }}"
                        class="profile-image">
                    <h5 class="fw-bold mt-5">
                        {{ $employee->name }}

                    </h5>
                    <b>
                        {{ $employee->designation }}
                    </b>
                    <hr>
                    <div>
                        {{ $employee->branch }}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                {{-- <div class="frontend-title">ब्यक्तिगत विवरण</div> --}}
                <div class="box">
                    <table class="table kalimati-font">
                        <tr>
                            <td>
                                <b>
                                    नाम
                                </b>
                            </td>
                            <td>{{ $employee->name }}</td>
                        </tr>
                        <tr>
                            <td>
                                <b>
                                    Name
                                </b>
                            </td>
                            <td>{{ $employee->name_english }}</td>
                        </tr>
                        @if ($employee->email)
                            <tr>
                                <td>
                                    <b>
                                        इमेल
                                    </b>
                                </td>
                                <td>
                                    <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
                                </td>
                            </tr>
                        @endif
                        @if ($employee->mobile)
                            <tr>
                                <td>
                                    <b>
                                        मोबाइल नं.
                                    </b>
                                </td>
                                <td>
                                    <a href="tel:{{ $employee->mobile }}">{{ $employee->mobile }}</a>
                                </td>
                            </tr>
                        @endif
                        @if ($employee->resident_contact_numbe)
                            <tr>
                                <td>
                                    <b>
                                        निवास सम्पर्क नं.
                                    </b>
                                </td>
                                <td>
                                    <a
                                        href="tel:{{ $employee->resident_contact_numbe }}">{{ $employee->resident_contact_numbe }}</a>
                                </td>
                            </tr>
                        @endif
                        @if ($employee->dob)
                            <tr>
                                <td>
                                    <b>
                                        जन्म मिति
                                    </b>
                                </td>
                                <td>{{ $employee->dob }}</td>
                            </tr>
                        @endif
                        @if ($employee->birth_place)
                            <tr>
                                <td>
                                    <b>
                                        जन्म स्थान
                                    </b>
                                </td>
                                <td>{{ $employee->birth_place }}</td>
                            </tr>
                        @endif

                        @if ($employee->permanent_address)
                            <tr>
                                <td>
                                    <b>
                                        स्थाई ठेगाना
                                    </b>
                                </td>
                                <td>{{ $employee->permanent_address }}, {{ $employee->permanent_address_district }}</td>
                            </tr>
                        @endif
                        @if ($employee->temporary_address)
                            <tr>
                                <td>
                                    <b>
                                        अस्थायी ठेगाना
                                    </b>
                                </td>
                                <td>{{ $employee->temporary_address }}, {{ $employee->temporary_address_district }}</td>
                            </tr>
                        @endif
                        @if ($employee->mother_name)
                            <tr>
                                <td>
                                    <b>
                                        बुवाको नाम
                                    </b>
                                </td>
                                <td>{{ $employee->father_name }}</td>
                            </tr>
                        @endif
                        @if ($employee->mother_name)
                            <tr>
                                <td>
                                    <b>
                                        आमाको नाम
                                    </b>
                                </td>
                                <td>{{ $employee->mother_name }}</td>
                            </tr>
                        @endif
                        @if ($employee->spouse_name)
                            <tr>
                                <td>
                                    <b>
                                        पति/पत्निको नाम
                                    </b>
                                </td>
                                <td>{{ $employee->spouse_name }}</td>
                            </tr>
                        @endif
                        @if ($employee->child)
                            <tr>
                                <td>
                                    <b>
                                        सन्तान
                                    </b>
                                </td>
                                <td>{{ $employee->child }}</td>
                            </tr>
                        @endif
                        @if ($employee->education)
                            <tr>
                                <td>
                                    <b>
                                        शिक्षा
                                    </b>
                                </td>
                                <td>{{ $employee->education }}</td>
                            </tr>
                        @endif
                        @if ($employee->religion)
                            <tr>
                                <td>
                                    <b>
                                        धर्म
                                    </b>
                                </td>
                                <td>{{ $employee->religion }}</td>
                            </tr>
                        @endif
                        @if ($employee->mother_tongue)
                            <tr>
                                <td>
                                    <b>
                                        मातृभाषा
                                    </b>
                                </td>
                                <td>{{ $employee->mother_tongue }}</td>
                            </tr>
                        @endif
                        @if ($employee->end_date)
                            <tr>
                                <td>
                                    <b>
                                        कार्यकाल
                                    </b>
                                </td>
                                <td>
                                    <div class="kalimati-font">{{ $employee->joining_date ?? '-' }} देखि
                                        {{ $employee->end_date ?? '-' }} सम्म
                                    </div>
                                </td>
                            </tr>
                        @endif

                    </table>
                </div>
            </div>
            @if ($employee->descriptions)
                <div class="col-md-12 box">
                    <p class="p-3">{!! $employee->descriptions !!}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
