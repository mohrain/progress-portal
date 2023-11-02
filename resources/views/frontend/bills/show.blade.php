@extends('frontend.layouts.app', ['title' => __($bill->name)])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="frontend-title">
                    {{ $bill->name }}
                    <hr>
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive box p-2">
                    <table class="table table-md table-bordered table-striped  table-hover kalimati-font">
                        <thead>
                            <th>मा. सदस्यहरुलाई वितरण</th>
                            <th>प्रदेश सभामा प्रस्तुत</th>
                            <th>सामान्य छलफल</th>
                            <th>प्रदेश सभामा दफावार छलफल भएको</th>
                            <th>समितिमा दफावार छलफल</th>
                            <th>समितिको प्रतिवेदन पेश भएको</th>
                            <th>प्रदेश सभाबाट पारित</th>
                            <th>प्रदेश सभाले पारित/फिर्ता गरेको</th>
                            <th>पुन:पारित गरेको</th>
                            <th>प्रमाणीकरण</th>
                        </thead>
                        <tbody style="white-space: nowrap;">
                            <td>{{ $bill->distribution_to_members_date }}</td>
                            <td>{{ $bill->representative_presented_in_assembly_date }}</td>
                            <td>{{ $bill->general_discussion_date }}</td>
                            <td>{{ $bill->weekly_in_assembly_discussion_date }}</td>
                            <td>{{ $bill->weekly_in_committee_discussion_date }}</td>
                            <td>{{ $bill->committee_report_submission_date }}</td>
                            <td>{{ $bill->passed_by_assembly_date }}</td>
                            <td>{{ $bill->assembly_rejected_date }}</td>
                            <td>{{ $bill->repassed_date }}</td>
                            <td>{{ $bill->authentication_date }}</td>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="box p-2">
                    <table class="table table-md table-bordered table-striped  table-hover kalimati-font">
                        <tbody>
                            <tr>
                                <th>दर्ता नं.</th>
                                <td>{{ $bill->entry_number }}</td>
                            </tr>
                            <tr>
                                <th>दर्ता मिति</th>
                                <td>{{ $bill->entry_date }}</td>
                            </tr>
                            <tr>
                                <th>संवत्</th>
                                <td>{{ $bill->year }}</td>
                            </tr>
                            <tr>
                                <th>प्रस्तुतकर्ता</th>
                                <td>{{ $bill->member->name }}</td>
                            </tr>
                            <tr>
                                <th>मन्त्रालय</th>
                                <td>{{ $bill->ministry->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="box p-2">
                    <table class="table table-md table-bordered table-striped  table-hover kalimati-font">
                        <tbody>
                            <tr>
                                <th>अधिवेशन</th>
                                <td>{{ $bill->convention }}</td>
                            </tr>
                            <tr>
                                <th>सरकारी/गैर-सरकारी</th>
                                <td>{{ $bill->gov_non_gov }}</td>
                            </tr>
                            <tr>
                                <th>मूल/संशोधन</th>
                                <td>{{ $bill->original_amendment }}</td>
                            </tr>
                            <tr>
                                <th>वर्ग</th>
                                <td>{{ $bill->billCategory->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="box p-2">
                    <table class="table table-md table-bordered table-striped  table-hover kalimati-font">
                        <tbody>
                            <tr>
                                <th>दर्ता विधेयक</th>
                                <td>
                                    @if ($bill->entry_bill_file)
                                        <a href="{{ asset('storage/' . $bill->entry_bill_file) }}" class="btn btn-primary"
                                            target="_blank" rel="noopener noreferrer"><i class="bi bi-cloud-arrow-down"></i>
                                            डाउनलोडस्</a>
                                    @else
                                        फाइल छैन
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>प्रमाणीकरण विधेयक</th>
                                <td>
                                    @if ($bill->certification_bill_file)
                                        <a href="{{ asset('storage/' . $bill->certification_bill_file) }}"
                                            class="btn btn-primary" target="_blank" rel="noopener noreferrer"><i
                                                class="bi bi-cloud-arrow-down"></i> डाउनलोडस्</a>
                                    @else
                                        फाइल छैन
                                    @endif
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            @if ($bill->descriptions)
                <div class="col-md-12 my-3">
                    <div class="frontend-subtitle">
                        विवरण
                        <hr>
                    </div>
                    <p>
                        {!! $bill->descriptions !!}
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
