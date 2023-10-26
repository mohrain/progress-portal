@extends('layouts.app', ['title' => __('सुझाप')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ 'सुझाप' }}
                            </div>

                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered kalimati-font" style="white-space: nowrap">

                                <tbody>

                                    <tr>
                                        <th>नाम</th>
                                        <td>{{ $contactUs->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>इमेल</th>
                                        <td>{{ $contactUs->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>सम्पर्क</th>
                                        <td>{{ $contactUs->contact_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>ठेगाना</th>
                                        <td>{{ $contactUs->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>बिषय</th>
                                        <td>{{ $contactUs->subject }}</td>
                                    </tr>
                                    <tr>
                                        <th>फाइल</th>
                                        <td>

                                            @if ($contactUs->file)
                                                <a href="{{ asset('storage/' . $contactUs->file) }}"
                                                    class="btn btn-primary" target="_blank"
                                                    rel="noopener noreferrer">डाउनलोडस्</a>
                                            @else
                                                फाइल छैन
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-center">
                                            सुझाप
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                           <p>
                                            {{ $contactUs->message }}
                                           </p>
                                        </td>
                                    </tr>


                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
