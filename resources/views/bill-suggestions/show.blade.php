@extends('layouts.app', ['title' => __($bill->name . '-सुझाप')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = $bill->name . ' - सुझाप' }}
                            </div>

                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered kalimati-font" style="white-space: nowrap">

                                <tbody>

                                    <tr>
                                        <th>नाम</th>
                                        <td>{{ $billSuggestion->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>इमेल</th>
                                        <td>{{ $billSuggestion->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>सम्पर्क</th>
                                        <td>{{ $billSuggestion->contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>ठेगाना</th>
                                        <td>{{ $billSuggestion->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>फाइल</th>
                                        <td>

                                            @if ($billSuggestion->file)
                                                <a href="{{ asset('storage/' . $billSuggestion->file) }}"
                                                    class="btn btn-primary" target="_blank"
                                                    rel="noopener noreferrer">डाउनलोडस्</a>
                                            @else
                                                फाइल छैन
                                            @endif
                                        </td>
                                    </tr>
                                    @foreach ($billSuggestion->billSuggestionSectionWise as $item)
                                        <tr>
                                            <th>दफा / उपदफा / खण्ड</th>
                                            <td>
                                                {{ $item->section }} / {{ $item->sub_section }} / {{ $item->sec }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                                हालको व्यवस्था
                                            </th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <p>
                                                    {{ $item->current_arrangement }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                                संशोधनको व्यहोरा
                                            </th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <p>
                                                    {{ $item->procedure_of_amendment }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                                कारण
                                            </th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <p>{{ $item->reason }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
