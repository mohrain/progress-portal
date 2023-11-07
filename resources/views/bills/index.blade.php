@extends('layouts.app', ['title' => __('विधयेकहरु')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'विधयेकहरु' }}
                            </div>
                            <div>
                                <a href="{{ route('bills.create') }}" class="btn btn-sm btn-primary bi bi-plus">नयाँ विधयेक
                                    दर्ता</a>
                                <a class="btn btn-secondary bi bi-funnel " data-toggle="collapse" href="#collapseExample"
                                    role="button" aria-expanded="false" aria-controls="collapseExample">
                                    फिल्टर
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="collapse my-2" id="collapseExample">
                            <div class="card card-body">
                                <form action="{{ route('bills.search') }}" method="get">

                                    <div class="row">
                                        <div class="col-md-3 mb-2">
                                            <x-bill-type-select-search />

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="name" class="form-label required">शीर्षक</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" value=""
                                                id="name" aria-describedby="name">

                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label for="entry_number" class="form-label required">दर्ता नं.</label>
                                            <input type="text" name="entry_number"
                                                class="form-control kalimati-font @error('entry_number') is-invalid @enderror"
                                                value="" id="entry_number" aria-describedby="entry_number">

                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label for="entry_date" class="form-label required">दर्ता मिति</label>
                                            <input type="text" name="entry_date"
                                                class="form-control kalimati-font nepali-date-picker @error('entry_date') is-invalid @enderror"
                                                value="" id="entry_date" aria-describedby="entry_date">

                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label for="year" class="form-label required">संवत्</label>
                                            <input type="text" name="year"
                                                class="form-control kalimati-font @error('year') is-invalid @enderror"
                                                value="" id="year" aria-describedby="year">

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <x-member-select />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <x-ministry-select />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="suggestion_in_the_bill"
                                                class="form-label text-md-end required">{{ __('विधेयकमा सुझाव') }}</label>

                                            <select
                                                class="form-control @error('suggestion_in_the_bill') is-invalid @enderror"
                                                name="suggestion_in_the_bill" id="suggestion_in_the_bill">
                                                <option value="">सबै</option>
                                                <option value="1">
                                                    लिने
                                                </option>
                                                <option value="0">
                                                    नलिने
                                                </option>
                                            </select>

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="convention" class="form-label required">अधिवेशन</label>
                                            <input type="text" name="convention"
                                                class="form-control kalimati-font @error('convention') is-invalid @enderror"
                                                value="" id="convention" aria-describedby="convention">

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="gov_non_gov"
                                                class="form-label text-md-end required">{{ __('सरकारी/गैर-सरकारी') }}</label>

                                            <select class="form-control @error('gov_non_gov') is-invalid @enderror"
                                                name="gov_non_gov" id="gov_non_gov">
                                                <option value="">सबै</option>

                                                <option value="सरकारी">
                                                    सरकारी
                                                </option>
                                                <option value="गैर-सरकारी">
                                                    गैर-सरकारी
                                                </option>
                                            </select>

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="original_amendment"
                                                class="form-label text-md-end required">{{ __('मूल/संशोधन') }}</label>

                                            <select class="form-control @error('original_amendment') is-invalid @enderror"
                                                name="original_amendment" id="original_amendment">
                                                <option value="">सबै</option>

                                                <option value="मूल">
                                                    मूल
                                                </option>
                                                <option value="संशोधन">
                                                    संशोधन
                                                </option>
                                            </select>

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <x-bill-category-select-search />
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="distribution_to_members_date" class="form-label">मा. सदस्यहरुलाई
                                                वितरण भएको मिति</label>
                                            <input type="text" name="distribution_to_members_date"
                                                class="form-control kalimati-font nepali-date-picker @error('distribution_to_members_date') is-invalid @enderror"
                                                value="" id="distribution_to_members_date"
                                                aria-describedby="distribution_to_members_date">

                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label for="representative_presented_in_assembly_date"
                                                class="form-label">प्रदेश सभामा
                                                प्रस्तुत भएको मिति</label>
                                            <input type="text" name="representative_presented_in_assembly_date"
                                                class="form-control kalimati-font nepali-date-picker @error('representative_presented_in_assembly_date') is-invalid @enderror"
                                                value="" id="representative_presented_in_assembly_date"
                                                aria-describedby="representative_presented_in_assembly_date">

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="general_discussion_date" class="form-label">सामान्य छलफल भएको
                                                मिति</label>
                                            <input type="text" name="general_discussion_date"
                                                class="form-control kalimati-font nepali-date-picker @error('general_discussion_date') is-invalid @enderror"
                                                value="" id="general_discussion_date"
                                                aria-describedby="general_discussion_date">

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="weekly_in_assembly_discussion_date" class="form-label">प्रदेश
                                                सभामा दफावार
                                                छलफल मिति</label>
                                            <input type="text" name="weekly_in_assembly_discussion_date"
                                                class="form-control kalimati-font nepali-date-picker @error('weekly_in_assembly_discussion_date') is-invalid @enderror"
                                                value="" id="weekly_in_assembly_discussion_date"
                                                aria-describedby="weekly_in_assembly_discussion_date">

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="weekly_in_committee_discussion_date" class="form-label">समितिमा
                                                दफावार
                                                छलफल मिति
                                            </label>
                                            <input type="text" name="weekly_in_committee_discussion_date"
                                                class="form-control kalimati-font nepali-date-picker @error('weekly_in_committee_discussion_date') is-invalid @enderror"
                                                value="" id="weekly_in_committee_discussion_date"
                                                aria-describedby="weekly_in_committee_discussion_date">

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="committee_report_submission_date" class="form-label">समितिको
                                                प्रतिवेदन पेश भएको मिति
                                            </label>
                                            <input type="text" name="committee_report_submission_date"
                                                class="form-control kalimati-font nepali-date-picker @error('committee_report_submission_date') is-invalid @enderror"
                                                value="" id="committee_report_submission_date"
                                                aria-describedby="committee_report_submission_date">

                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label for="passed_by_assembly_date" class="form-label">प्रदेश सभाबाट पारित
                                                मिति</label>
                                            <input type="text" name="passed_by_assembly_date"
                                                class="form-control kalimati-font nepali-date-picker @error('passed_by_assembly_date') is-invalid @enderror"
                                                value="" id="passed_by_assembly_date"
                                                aria-describedby="passed_by_assembly_date">

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="assembly_rejected_date" class="form-label">प्रदेश सभाले
                                                पारित/फिर्ता
                                                गरेको मिति
                                            </label>
                                            <input type="text" name="assembly_rejected_date"
                                                class="form-control kalimati-font nepali-date-picker @error('assembly_rejected_date') is-invalid @enderror"
                                                value="" id="assembly_rejected_date"
                                                aria-describedby="assembly_rejected_date">

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="repassed_date" class="form-label">पुन:पारित गरेको मिति</label>
                                            <input type="text" name="repassed_date"
                                                class="form-control kalimati-font nepali-date-picker @error('repassed_date') is-invalid @enderror"
                                                value="" id="repassed_date" aria-describedby="repassed_date">

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="authentication_date" class="form-label">प्रमाणीकरण मिति</label>
                                            <input type="text" name="authentication_date"
                                                class="form-control kalimati-font nepali-date-picker @error('authentication_date') is-invalid @enderror"
                                                value="" id="authentication_date"
                                                aria-describedby="authentication_date">

                                        </div>


                                        <div class="col-md-3 mb-2">
                                            <label for="status" class="form-label">अवस्था</label>
                                            <input type="text" name="status"
                                                class="form-control kalimati-font @error('status') is-invalid @enderror"
                                                value="" id="status" aria-describedby="status">

                                        </div>


                                        <div class="col-md-12 mb-3 text-right">
                                            <button type="submit" class="btn btn-primary bi bi-search">
                                                खोजी गर्नुहोस्
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-md table-bordered kalimati-font" style="white-space: nowrap">
                                <thead>
                                    <th>विधेयक किसिम</th>
                                    <th>अधिवेशन</th>
                                    <th>दर्ता नं.</th>
                                    <th>दर्ता मिति</th>
                                    <th>शीर्षक</th>
                                    <th>मन्त्रालय</th>
                                    <th>विधेयकमा सुझाव</th>
                                    <th>अवस्था</th>
                                    <th>दर्ता विधेयक फाइल</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse($bills as $bill)
                                        @php
                                            if ($bill->billType->id == 1) {
                                                $trColor = 'table-info';
                                            } elseif ($bill->billType->id == 2) {
                                                $trColor = 'table-secondary';
                                            } elseif ($bill->billType->id == 3) {
                                                $trColor = 'table-warning';
                                            } else {
                                                $trColor = 'table-light';
                                            }

                                        @endphp

                                        <tr class="{{ $trColor }}">
                                            <td>{{ $bill->billType->name }}</td>
                                            <td>{{ $bill->convention }}</td>
                                            <td>{{ $bill->entry_number }}</td>
                                            <td>{{ $bill->entry_date }}</td>
                                            <td>{{ $bill->name }}</td>
                                            <td>{{ $bill->ministry->name ?? "" }}</td>
                                            <td>
                                                @if ($bill->suggestion_in_the_bill == true)
                                                    <span class="badge badge-primary">
                                                        लिने
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary">
                                                        नलिने
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $bill->status }}</td>
                                            <td>

                                                @if ($bill->entry_bill_file)
                                                    <a href="{{ asset('storage/' . $bill->entry_bill_file) }}"
                                                        class="btn btn-primary" target="_blank"
                                                        rel="noopener noreferrer">डाउनलोडस्</a>
                                                @else
                                                    फाइल छैन
                                                @endif
                                            </td>

                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class=" btn-icon-only text-light" href="#" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        <a class="dropdown-item "
                                                            href="{{ route('bill-suggestions.index', $bill) }}">Suggestions</a>
                                                        <a class="dropdown-item "
                                                            href="{{ route('bills.show', $bill) }}">Show</a>

                                                        <a class="dropdown-item "
                                                            href="{{ route('bills.edit', $bill) }}">Edit</a>

                                                        <form action="{{ route('bills.destroy', $bill) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="dropdown-item form-control text-danger"
                                                                type="submit"
                                                                onclick="return confirm('के तपाई सुनिचित गर्नुहुन्छ ?')">
                                                                Delete
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="42" class="font-italic text-center">कुनैपनि डाटा उपलब्ध छैन !!!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>


                            </table>
                        </div>
                        {{ $bills->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
