@extends('layouts.app', ['title' => __('विधयेक दर्ता')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'विधयेक दर्ता' }}
                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ $bill->id ? route('bills.update', $bill) : route('bills.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($bill->id)
                                @method('put')
                            @endif
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <x-bill-type-select :bill="$bill" />

                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="name" class="form-label required">शीर्षक</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $bill->name) }}" id="name" aria-describedby="name">
                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label for="entry_number" class="form-label required">दर्ता नं.</label>
                                    <input type="text" name="entry_number"
                                        class="form-control kalimati-font @error('entry_number') is-invalid @enderror"
                                        value="{{ old('entry_number', $bill->entry_number) }}" id="entry_number"
                                        aria-describedby="entry_number">
                                    <div class="invalid-feedback">
                                        @error('entry_number')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label for="entry_date" class="form-label required">दर्ता मिति</label>
                                    <input type="text" name="entry_date"
                                        class="form-control kalimati-font nepali-date-picker @error('entry_date') is-invalid @enderror"
                                        value="{{ old('entry_date', $bill->entry_date) }}" id="entry_date"
                                        aria-describedby="entry_date">
                                    <div class="invalid-feedback">
                                        @error('entry_date')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label for="year" class="form-label required">संवत्</label>
                                    <input type="text" name="year"
                                        class="form-control kalimati-font @error('year') is-invalid @enderror"
                                        value="{{ old('year', $bill->year) }}" id="year" aria-describedby="year">
                                    <div class="invalid-feedback">
                                        @error('year')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <x-member-select :bill="$bill" />
                                </div>
                                <div class="col-md-3 mb-2">
                                    <x-ministry-select :bill="$bill" />
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="suggestion_in_the_bill"
                                        class="form-label text-md-end required">{{ __('विधेयकमा सुझाव') }}</label>

                                    <select class="form-control @error('suggestion_in_the_bill') is-invalid @enderror"
                                        name="suggestion_in_the_bill" id="suggestion_in_the_bill">
                                        <option value="1"
                                            {{ old('suggestion_in_the_bill', $bill->suggestion_in_the_bill) == '1' ? 'selected' : '' }}>
                                            लिने
                                        </option>
                                        <option value="0"
                                            {{ old('suggestion_in_the_bill', $bill->suggestion_in_the_bill) == '0' ? 'selected' : '' }}>
                                            नलिने
                                        </option>
                                    </select>
                                    @error('suggestion_in_the_bill')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="convention" class="form-label required">अधिवेशन</label>
                                    <input type="text" name="convention"
                                        class="form-control kalimati-font @error('convention') is-invalid @enderror"
                                        value="{{ old('convention', $bill->convention) }}" id="convention"
                                        aria-describedby="convention">
                                    <div class="invalid-feedback">
                                        @error('convention')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="gov_non_gov"
                                        class="form-label text-md-end required">{{ __('सरकारी/गैर-सरकारी') }}</label>

                                    <select class="form-control @error('gov_non_gov') is-invalid @enderror"
                                        name="gov_non_gov" id="gov_non_gov">
                                        <option value="सरकारी"
                                            {{ old('gov_non_gov', $bill->gov_non_gov) == 'सरकारी' ? 'selected' : '' }}>
                                            सरकारी
                                        </option>
                                        <option value="गैर-सरकारी"
                                            {{ old('gov_non_gov', $bill->gov_non_gov) == 'गैर-सरकारी' ? 'selected' : '' }}>
                                            गैर-सरकारी
                                        </option>
                                    </select>
                                    @error('gov_non_gov')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="original_amendment"
                                        class="form-label text-md-end required">{{ __('मूल/संशोधन') }}</label>

                                    <select class="form-control @error('original_amendment') is-invalid @enderror"
                                        name="original_amendment" id="original_amendment">
                                        <option value="मूल"
                                            {{ old('original_amendment', $bill->original_amendment) == 'मूल' ? 'selected' : '' }}>
                                            मूल
                                        </option>
                                        <option value="संशोधन"
                                            {{ old('original_amendment', $bill->original_amendment) == 'संशोधन' ? 'selected' : '' }}>
                                            संशोधन
                                        </option>
                                    </select>
                                    @error('original_amendment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <x-bill-category-select :bill="$bill" />
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="distribution_to_members_date" class="form-label">मा. सदस्यहरुलाई
                                        वितरण भएको मिति</label>
                                    <input type="text" name="distribution_to_members_date"
                                        class="form-control kalimati-font nepali-date-picker @error('distribution_to_members_date') is-invalid @enderror"
                                        value="{{ old('distribution_to_members_date', $bill->distribution_to_members_date) }}"
                                        id="distribution_to_members_date" aria-describedby="distribution_to_members_date">
                                    <div class="invalid-feedback">
                                        @error('distribution_to_members_date')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label for="representative_presented_in_assembly_date" class="form-label">प्रदेश सभामा
                                        प्रस्तुत भएको मिति</label>
                                    <input type="text" name="representative_presented_in_assembly_date"
                                        class="form-control kalimati-font nepali-date-picker @error('representative_presented_in_assembly_date') is-invalid @enderror"
                                        value="{{ old('representative_presented_in_assembly_date', $bill->representative_presented_in_assembly_date) }}"
                                        id="representative_presented_in_assembly_date"
                                        aria-describedby="representative_presented_in_assembly_date">
                                    <div class="invalid-feedback">
                                        @error('representative_presented_in_assembly_date')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="general_discussion_date" class="form-label">सामान्य छलफल भएको मिति</label>
                                    <input type="text" name="general_discussion_date"
                                        class="form-control kalimati-font nepali-date-picker @error('general_discussion_date') is-invalid @enderror"
                                        value="{{ old('general_discussion_date', $bill->general_discussion_date) }}"
                                        id="general_discussion_date" aria-describedby="general_discussion_date">
                                    <div class="invalid-feedback">
                                        @error('general_discussion_date')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="weekly_in_assembly_discussion_date" class="form-label">प्रदेश सभामा दफावार
                                        छलफल मिति</label>
                                    <input type="text" name="weekly_in_assembly_discussion_date"
                                        class="form-control kalimati-font nepali-date-picker @error('weekly_in_assembly_discussion_date') is-invalid @enderror"
                                        value="{{ old('weekly_in_assembly_discussion_date', $bill->weekly_in_assembly_discussion_date) }}"
                                        id="weekly_in_assembly_discussion_date"
                                        aria-describedby="weekly_in_assembly_discussion_date">
                                    <div class="invalid-feedback">
                                        @error('weekly_in_assembly_discussion_date')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="weekly_in_committee_discussion_date" class="form-label">समितिमा दफावार
                                        छलफल मिति
                                    </label>
                                    <input type="text" name="weekly_in_committee_discussion_date"
                                        class="form-control kalimati-font nepali-date-picker @error('weekly_in_committee_discussion_date') is-invalid @enderror"
                                        value="{{ old('weekly_in_committee_discussion_date', $bill->weekly_in_committee_discussion_date) }}"
                                        id="weekly_in_committee_discussion_date"
                                        aria-describedby="weekly_in_committee_discussion_date">
                                    <div class="invalid-feedback">
                                        @error('weekly_in_committee_discussion_date')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="committee_report_submission_date" class="form-label">समितिको
                                        प्रतिवेदन पेश भएको मिति
                                    </label>
                                    <input type="text" name="committee_report_submission_date"
                                        class="form-control kalimati-font nepali-date-picker @error('committee_report_submission_date') is-invalid @enderror"
                                        value="{{ old('committee_report_submission_date', $bill->committee_report_submission_date) }}"
                                        id="committee_report_submission_date"
                                        aria-describedby="committee_report_submission_date">
                                    <div class="invalid-feedback">
                                        @error('committee_report_submission_date')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label for="passed_by_assembly_date" class="form-label">प्रदेश सभाबाट पारित
                                        मिति</label>
                                    <input type="text" name="passed_by_assembly_date"
                                        class="form-control kalimati-font nepali-date-picker @error('passed_by_assembly_date') is-invalid @enderror"
                                        value="{{ old('passed_by_assembly_date', $bill->passed_by_assembly_date) }}"
                                        id="passed_by_assembly_date" aria-describedby="passed_by_assembly_date">
                                    <div class="invalid-feedback">
                                        @error('passed_by_assembly_date')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="assembly_rejected_date" class="form-label">प्रदेश सभाले पारित/फिर्ता
                                        गरेको मिति
                                    </label>
                                    <input type="text" name="assembly_rejected_date"
                                        class="form-control kalimati-font nepali-date-picker @error('assembly_rejected_date') is-invalid @enderror"
                                        value="{{ old('assembly_rejected_date', $bill->assembly_rejected_date) }}"
                                        id="assembly_rejected_date" aria-describedby="assembly_rejected_date">
                                    <div class="invalid-feedback">
                                        @error('assembly_rejected_date')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="repassed_date" class="form-label">पुन:पारित गरेको मिति</label>
                                    <input type="text" name="repassed_date"
                                        class="form-control kalimati-font nepali-date-picker @error('repassed_date') is-invalid @enderror"
                                        value="{{ old('repassed_date', $bill->repassed_date) }}" id="repassed_date"
                                        aria-describedby="repassed_date">
                                    <div class="invalid-feedback">
                                        @error('repassed_date')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="authentication_date" class="form-label">प्रमाणीकरण मिति</label>
                                    <input type="text" name="authentication_date"
                                        class="form-control kalimati-font nepali-date-picker @error('authentication_date') is-invalid @enderror"
                                        value="{{ old('authentication_date', $bill->authentication_date) }}"
                                        id="authentication_date" aria-describedby="authentication_date">
                                    <div class="invalid-feedback">
                                        @error('authentication_date')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="entry_bill_file" class="form-label">
                                        दर्ता विधेयक फाइल</label>
                                    @if ($bill->entry_bill_file)
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <a href="{{ asset('storage/' . $bill->entry_bill_file) }}"
                                                    class="btn btn-primary" target="_blank" rel="noopener noreferrer"><i
                                                        class="bi bi-cloud-arrow-down"></i> डाउनलोडस्
                                                </a>
                                            </div>
                                            <div>
                                                <a href="{{ route('bills.entryBillFile', $bill) }}"
                                                    class="btn btn-md btn-danger">
                                                    <i class="bi bi-x-lg"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <input type="file" name="entry_bill_file"
                                            class="form-control kalimati-font @error('entry_bill_file') is-invalid @enderror"
                                            value="{{ old('entry_bill_file', $bill->entry_bill_file) }}"
                                            id="entry_bill_file" aria-describedby="entry_bill_file">
                                        <div class="invalid-feedback">
                                            @error('entry_bill_file')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="certification_bill_file" class="form-label">प्रमाणीकरण विधेयक फाइल</label>
                                    @if ($bill->certification_bill_file)
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <a href="{{ asset('storage/' . $bill->certification_bill_file) }}"
                                                    class="btn btn-primary" target="_blank" rel="noopener noreferrer"><i
                                                        class="bi bi-cloud-arrow-down"></i> डाउनलोडस्</a>
                                            </div>
                                            <div>
                                                <a href="{{ route('bills.certificationBillFile', $bill) }}"
                                                    class="btn btn-md btn-danger">
                                                    <i class="bi bi-x-lg"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <input type="file" name="certification_bill_file"
                                            class="form-control kalimati-font @error('certification_bill_file') is-invalid @enderror"
                                            value="{{ old('certification_bill_file', $bill->certification_bill_file) }}"
                                            id="certification_bill_file" aria-describedby="certification_bill_file">
                                        <div class="invalid-feedback">
                                            @error('certification_bill_file')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    @endif


                                </div>

                                <div class="col-md-3 mb-2">
                                    <label for="status" class="form-label">अवस्था</label>
                                    <input type="text" name="status"
                                        class="form-control kalimati-font @error('status') is-invalid @enderror"
                                        value="{{ old('status', $bill->status) }}" id="status"
                                        aria-describedby="status">
                                    <div class="invalid-feedback">
                                        @error('status')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="summernote" class="form-label ">विवरण</label>
                                    <textarea name="descriptions" class="" id="summernote" cols="30" rows="10">{!! old('descriptions', $bill->descriptions) !!}</textarea>
                                </div>

                                <div class="col-md-12 mb-3 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $bill->id ? 'सम्पादन' : 'सुरक्षित' }}</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
