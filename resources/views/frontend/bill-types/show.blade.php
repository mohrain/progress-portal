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
            <div class="table-responsive bg-white p-2">
                <table class="table table-md table-bordered table-striped  table-hover kalimati-font" >
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
                                <td>{{ $bill->ministry->name }}</td>
                                <td>{{ $bill->status }}</td>
                                <td style="white-space: nowrap;">
                                    <a href="{{route('bills.show',$bill)}}" class="btn btn-sm btn-primary">	
                                        पढ्नुहोस् <i class="bi bi-chevron-double-right"></i>
                                    </a>
                                </td>
                                <td>
                                    @if ($bill->suggestion_in_the_bill == true)
                                        <a href="{{route('bill-suggestions.create',$bill)}}" class="btn btn-sm btn-success">
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
