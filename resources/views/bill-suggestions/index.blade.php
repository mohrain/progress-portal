@extends('layouts.app', ['title' => __($bill->name . '-सुझापहरु')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = $bill->name . '-सुझापहरु' }}
                            </div>
                            <div>
                                <a href="{{ route('bills.print', $bill) }}" target="_blank" rel="noopener noreferrer"
                                    class="btn btn-sm btn-primary bi bi-printer"> प्रिन्ट</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered" style="white-space: nowrap">
                                <thead>
                                    <th>नाम</th>
                                    <th>इमेल</th>
                                    <th>सम्पर्क</th>
                                    <th>ठेगाना</th>
                                    <th>फाइल</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse($billSuggestions as $billSuggestion)
                                        <tr>
                                            <td>{{ $billSuggestion->name }}</td>
                                            <td>{{ $billSuggestion->email }}</td>
                                            <td class="kalimati-font">{{ $billSuggestion->contact_number }}</td>
                                            <td class="kalimati-font">{{ $billSuggestion->address }}</td>
                                            <td>

                                                @if ($billSuggestion->file)
                                                    <a href="{{ asset('storage/' . $billSuggestion->file) }}"
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
                                                            href="{{ route('bill-suggestions.show', [$bill, $billSuggestion]) }}">Show</a>
                                                            <a class="dropdown-item "
                                                            href="{{ route('bill-suggestions.print', [$bill, $billSuggestion]) }}" target="_blank">Print</a>

                                                        <form
                                                            action="{{ route('bill-suggestions.destroy', [$bill, $billSuggestion]) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="dropdown-item form-control text-danger"
                                                                type="submit"
                                                                onclick="return confirm('के तपाई सुनिचित गर्नुहुन्छ  ?')">
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
                        {{ $billSuggestions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
