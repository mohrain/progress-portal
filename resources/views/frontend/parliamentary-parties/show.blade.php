@extends('frontend.layouts.app', ['title' => __('संसदीय दलहरु')])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="frontend-title">
                    संसदीय दलहरु
                    <hr>
                </div>
                <table class="table table-md table-bordered">
                    <thead>
                        <tr >
                            <th rowspan="2">क्र.सं.</th>
                            <th rowspan="2">राजनीतिक दल</th>
                            <th colspan="3" class="text-center">महिला</th>
                            <th colspan="3" class="text-center">पुरुष</th>
                            <th rowspan="2">जम्मा</th>
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

                    <tbody>
                        @forelse($parliamentaryPartys as $parliamentaryParty)

                            <tr>
                                <td class="kalimati-font">{{$loop->iteration}}</td>
                                <td class="sort-handle">{{ $parliamentaryParty->name }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="42" class="font-italic text-center">कुनैपनि डाटा उपलब्ध छैन !!!</td>
                            </tr>
                        @endforelse
                    </tbody>


                </table>
            </div>
            <div class="col-md-3">
                @include('frontend.layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
