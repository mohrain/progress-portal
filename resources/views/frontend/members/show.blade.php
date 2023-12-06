@extends('frontend.layouts.app', ['title' => __($member->name)])
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
                    <img src="{{ $member->profile ? asset('storage/' . $member->profile) : asset('assets/img/no-image.png') }}"
                        class="profile-image">
                    <h5 class="mt-5 fw-bold">

                         {{ $member->name }}

                    </h5>
                    <h6>
                        @if ($member->officeBearers->isEmpty())
                            प्रदेश सभा सदस्य
                        @else
                            @foreach ($member->officeBearers as $officeBearer)
                                @if ($officeBearer->start != null && $officeBearer->end == null)
                                    {{ $officeBearer->designation == true ? 'माननीय सभामुख' : 'माननीय उपसभामुख' }}
                                @endif
                            @endforeach
                        @endif
                    </h6>
                    <hr>
                    <div>
                        <b>
                            {{ $member->election_process }}
                        </b>
                    </div>
                    <div>
                        {{ $member->election_district }}, {{ $member->election_area }}
                    </div>
                    <hr>
                    <div>
                        <b>
                            {{ $member->parliamentaryParty->name }}
                        </b>
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
                            <td>{{ $member->name }}</td>
                        </tr>
                        <tr>
                            <td>
                                <b>
                                    Name
                                </b>
                            </td>
                            <td>{{ $member->name_english }}</td>
                        </tr>
                        @if ($member->email)
                            <tr>
                                <td>
                                    <b>
                                        इमेल
                                    </b>
                                </td>
                                <td>
                                    <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                                </td>
                            </tr>
                        @endif
                        @if ($member->mobile)
                            <tr>
                                <td>
                                    <b>
                                        मोबाइल नं.
                                    </b>
                                </td>
                                <td>
                                    <a href="tel:{{ $member->mobile }}">{{ $member->mobile }}</a>
                                </td>
                            </tr>
                        @endif
                        @if ($member->resident_contact_numbe)
                            <tr>
                                <td>
                                    <b>
                                        निवास सम्पर्क नं.
                                    </b>
                                </td>
                                <td>
                                    <a
                                        href="tel:{{ $member->resident_contact_numbe }}">{{ $member->resident_contact_numbe }}</a>
                                </td>
                            </tr>
                        @endif
                        @if ($member->dob)
                            <tr>
                                <td>
                                    <b>
                                        जन्म मिति
                                    </b>
                                </td>
                                <td>{{ $member->dob }}</td>
                            </tr>
                        @endif
                        @if ($member->birth_place)
                            <tr>
                                <td>
                                    <b>
                                        जन्म स्थान
                                    </b>
                                </td>
                                <td>{{ $member->birth_place }}</td>
                            </tr>
                        @endif

                        @if ($member->permanent_address)
                            <tr>
                                <td>
                                    <b>
                                        स्थाई ठेगाना
                                    </b>
                                </td>
                                <td>{{ $member->permanent_address }}, {{ $member->permanent_address_district }}</td>
                            </tr>
                        @endif
                        @if ($member->temporary_address)
                            <tr>
                                <td>
                                    <b>
                                        अस्थायी ठेगाना
                                    </b>
                                </td>
                                <td>{{ $member->temporary_address }}, {{ $member->temporary_address_district }}</td>
                            </tr>
                        @endif
                        @if ($member->mother_name)
                            <tr>
                                <td>
                                    <b>
                                        बुवाको नाम
                                    </b>
                                </td>
                                <td>{{ $member->father_name }}</td>
                            </tr>
                        @endif
                        @if ($member->mother_name)
                            <tr>
                                <td>
                                    <b>
                                        आमाको नाम
                                    </b>
                                </td>
                                <td>{{ $member->mother_name }}</td>
                            </tr>
                        @endif
                        @if ($member->spouse_name)
                            <tr>
                                <td>
                                    <b>
                                        पति/पत्निको नाम
                                    </b>
                                </td>
                                <td>{{ $member->spouse_name }}</td>
                            </tr>
                        @endif
                        @if ($member->child)
                            <tr>
                                <td>
                                    <b>
                                        सन्तान
                                    </b>
                                </td>
                                <td>{{ $member->child }}</td>
                            </tr>
                        @endif
                        @if ($member->education)
                            <tr>
                                <td>
                                    <b>
                                        शिक्षा
                                    </b>
                                </td>
                                <td>{{ $member->education }}</td>
                            </tr>
                        @endif
                        @if ($member->religion)
                            <tr>
                                <td>
                                    <b>
                                        धर्म
                                    </b>
                                </td>
                                <td>{{ $member->religion }}</td>
                            </tr>
                        @endif
                        @if ($member->mother_tongue)
                            <tr>
                                <td>
                                    <b>
                                        मातृभाषा
                                    </b>
                                </td>
                                <td>{{ $member->mother_tongue }}</td>
                            </tr>
                        @endif

                    </table>
                </div>
            </div>
            @if ($member->descriptions)
                <div class="col-md-12 box">
                    <p class="p-3">{!! $member->descriptions !!}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
