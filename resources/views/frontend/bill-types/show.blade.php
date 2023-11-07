@extends('frontend.layouts.app', ['title' => __($billType->name)])
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="frontend-title">
                    {{ $billType->name }}
                    <hr>
                </div>
            </div>
            <div class="box p-3">
                <form action="{{ route('bills.frontendSearch',$billType) }}" method="get">
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <label for="bill_date_from" class="form-label">शुरु मिति</label>
                            <input type="text" name="bill_date_from"
                                class="form-control kalimati-font nepali-date-picker @error('bill_date_from') is-invalid @enderror"
                                value="" id="bill_date_from" aria-describedby="bill_date_from">

                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="bill_date_to" class="form-label">अन्त्य मिति</label>
                            <input type="text" name="bill_date_to"
                                class="form-control kalimati-font nepali-date-picker @error('bill_date_to') is-invalid @enderror"
                                value="" id="bill_date_to" aria-describedby="bill_date_to">

                        </div>

                        <div class="col-md-2 mb-2">
                            <label for="entry_number" class="form-label">दर्ता नं.</label>
                            <input type="text" name="entry_number"
                                class="form-control kalimati-font @error('entry_number') is-invalid @enderror"
                                value="" id="entry_number" aria-describedby="entry_number">

                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="name" class="form-label">शीर्षक</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="" id="name" aria-describedby="name">

                        </div>


                        <div class="col-md-2 mb-2 mt-auto">
                            <button type="submit" class="btn btn-primary bi bi-search">
                                खोजी गर्नुहोस्
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive box p-2 mt-2">
                <table class="table table-md table-bordered table-striped  table-hover kalimati-font">
                    <thead>
                        <th>अधिवेशन</th>
                        <th style="white-space: nowrap;">दर्ता नं.</th>
                        <th>दर्ता मिति</th>
                        <th>शीर्षक</th>
                        <th>मन्त्रालय</th>
                        <th>अवस्था</th>
                        <th></th>
                        <th>विधेयकमा सुझाव</th>
                    </thead>
                    <tbody>
                        @forelse($bills as $bill)
                            <tr>
                                <td>{{ $bill->convention }}</td>
                                <td>{{ $bill->entry_number }}</td>
                                <td style="white-space: nowrap;">{{ $bill->entry_date }}</td>
                                <td>{{ $bill->name }}</td>
                                <td>{{ $bill->ministry->name ?? ""}}</td>
                                <td>{{ $bill->status }}</td>
                                <td style="white-space: nowrap;">
                                    <a href="{{ route('bills.show', $bill) }}" class="btn btn-sm btn-primary">
                                        पढ्नुहोस् <i class="bi bi-chevron-double-right"></i>
                                    </a>
                                </td>
                                <td>
                                    @if ($bill->suggestion_in_the_bill == true)
                                        <a href="{{ route('bill-suggestions.create', $bill) }}"
                                            class="btn btn-sm btn-success">
                                            सुझाप दिनुहोस्
                                        </a>
                                    @endif
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
@endsection
