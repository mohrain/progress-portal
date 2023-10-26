@extends('layouts.app', ['title' => __("सुझापहरु")])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = "सुझापहरु" }}
                            </div>
                           
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered kalimati-font" style="white-space: nowrap">
                                <thead>
                                    <th>नाम</th>
                                    <th>इमेल</th>
                                    <th>सम्पर्क</th>
                                    <th>ठेगाना</th>
                                    <th>बिषय</th>
                                    <th>फाइल</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse($contactUss as $contactUs)
                                        <tr>
                                            <td>{{ $contactUs->name }}</td>
                                            <td>{{ $contactUs->email }}</td>
                                            <td>{{ $contactUs->contact_number }}</td>
                                            <td>{{ $contactUs->address }}</td>
                                            <td>{{ $contactUs->subject }}</td>
                                            <td>

                                                @if ($contactUs->file)
                                                    
                                                <a href="{{ asset('storage/' . $contactUs->file) }}" class="btn btn-primary"
                                                    target="_blank" rel="noopener noreferrer">डाउनलोडस्</a>
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
                                                        href="{{ route('contact-us.show', [$contactUs]) }}">Show</a>

                                                        <form action="{{ route('contact-us.destroy', [$contactUs]) }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="dropdown-item form-control text-danger"
                                                                type="submit" onclick="return confirm('के तपाई सुनिचित गर्नुहुन्छ  ?')">
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
                        {{ $contactUss->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
