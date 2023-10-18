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
                                <a href="{{ route('bills.create') }}" class="btn btn-sm btn-primary">नयाँ विधयेक दर्ता</a>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered kalimati-font" style="white-space: nowrap">
                                <thead>
                                    <th>विधेयक</th>
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

                                        <tr class="{{$trColor}}">
                                            <td>{{ $bill->billType->name }}</td>
                                            <td>{{ $bill->convention }}</td>
                                            <td>{{ $bill->entry_number }}</td>
                                            <td>{{ $bill->entry_date }}</td>
                                            <td>{{ $bill->name }}</td>
                                            <td>{{ $bill->ministry->name }}</td>
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
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        <a class="dropdown-item "
                                                            href="{{ route('bill-suggestions.index', $bill) }}">Suggestions</a>
                                                        <a class="dropdown-item "
                                                            href="{{ route('bills.show', $bill) }}">Show</a>

                                                        <a class="dropdown-item "
                                                            href="{{ route('bills.edit', $bill) }}">Edit</a>

                                                        <form action="{{ route('bills.destroy', $bill) }}" method="post">
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
