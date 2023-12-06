@extends('frontend.layouts.app', ['title' => __("राजनीतिक दलहरू")])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="frontend-title">
                            प्रदेश सभामा प्रतिनिधित्व गर्ने संसदीय दलहरु
                            <hr>
                        </div>
                    </div>
                    <div class="table-responsive box p-2 kalimati-font">
                        <table class="table table-md table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">क्र.सं.</th>
                                    <th rowspan="2">राजनीतिक दल</th>
                                    <th colspan="3" class="text-center">पुरुष</th>
                                    <th colspan="3" class="text-center">महिला</th>
                                    <th rowspan="2">जम्मा सदस्य सङ्ख्या</th>
                                </tr>
                                <tr >
                                    <th>प्रत्यक्ष</th>
                                    <th>समानुपातिक</th>
                                    <th>जम्मा</th>
                                    <th>प्रत्यक्ष</th>
                                    <th>समानुपातिक</th>
                                    <th>जम्मा</th>
                                </tr>
                            </thead>
                            @php
                                $male_directly_total = 0;
                                $male_proportionate_total = 0;
                                $female_directly_total = 0;
                                $female_proportionate_total = 0;
                                $male = 0;
                                $female = 0;
                                $total = 0;

                                $grand_male_directly_total = 0;
                                $grand_male_proportionate_total = 0;
                                $grand_female_directly_total = 0;
                                $grand_female_proportionate_total = 0;
                                $grand_male = 0;
                                $grand_female = 0;
                                $grand_total = 0;

                            @endphp
                            <tbody id="sortable-current-parliamentary-parties">
                                @forelse($currentParliamentaryParties as $currentParliamentaryParty)
                                    @php
                                        $male = $currentParliamentaryParty->male_directly + $currentParliamentaryParty->male_proportionate;
                                        $grand_male = $grand_male + $male;

                                        $female = $currentParliamentaryParty->female_directly + $currentParliamentaryParty->female_proportionate;
                                        $grand_female = $grand_female + $female;

                                        $total = $male + $female;
                                        $male_directly_total = $male_directly_total + $currentParliamentaryParty->male_directly;
                                        $male_proportionate_total = $male_proportionate_total + $currentParliamentaryParty->male_proportionate;
                                        $female_directly_total = $female_directly_total + $currentParliamentaryParty->female_directly;
                                        $female_proportionate_total = $female_proportionate_total + $currentParliamentaryParty->female_proportionate;

                                        $grand_total = $grand_total + $total;
                                    @endphp
                                    <tr data-id="{{ $currentParliamentaryParty->id }}"
                                        data-order="{{ $currentParliamentaryParty->position ?? 0 }}">
                                        <td class="sort-handle">{{ $loop->iteration }}</td>
                                        <td>{{ $currentParliamentaryParty->parliamentaryParty->name }}</td>
                                        <td>{{ $currentParliamentaryParty->male_directly }}</td>
                                        <td>{{ $currentParliamentaryParty->male_proportionate }}</td>
                                        <td>{{ $male }}</td>
                                        <td>{{ $currentParliamentaryParty->female_directly }}</td>
                                        <td>{{ $currentParliamentaryParty->female_proportionate }}</td>
                                        <td>{{ $female }}</td>
                                        <td>{{ $total }}</td>
                                      
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="42" class="font-italic text-center">कुनैपनि डाटा उपलब्ध छैन !!!
                                        </td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td></td>
                                    <th>जम्मा</th>
                                    <td>{{ $male_directly_total }}</td>
                                    <td>{{ $male_proportionate_total }}</td>
                                    <td>{{ $grand_male }}</td>
                                    <td>{{ $female_directly_total }}</td>
                                    <td>{{ $female_proportionate_total }}</td>
                                    <td>{{ $grand_female }}</td>
                                    <td>{{ $grand_total }}</td>
                                </tr>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('frontend.layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
