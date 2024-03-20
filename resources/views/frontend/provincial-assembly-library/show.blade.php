@extends('frontend.layouts.app', ['title' => __($provincialAssemblyLibrary->title)])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="frontend-title">
                            {{ $provincialAssemblyLibrary->title }}
                        </div>
                        <div class="d-flex justify-content-between"> 
                            <div>
                                <b>दर्ता नं. :</b>  {{ $provincialAssemblyLibrary->entry_no }}
                            </div>
                            <div>
                                <b>लेखक :</b>  {{ $provincialAssemblyLibrary->author }}
                            </div>
                        </div>
                        <hr>

                    </div>
                    @if ($provincialAssemblyLibrary->cover_image)
                        <div class="col-md-12 text-center">
                            <img class="feature-img"
                                src="{{ $provincialAssemblyLibrary->feature_image ? asset('storage/' . $provincialAssemblyLibrary->feature_image) : asset('assets/img/no-image.png') }}">
                        </div>
                    @endif
                    @if ($provincialAssemblyLibrary->descriptions)
                        <div class="col-md-12 mt-4">
                            <p>
                                {!! $provincialAssemblyLibrary->descriptions !!}
                            </p>
                        </div>
                    @endif
                    @if ($provincialAssemblyLibrary->documents->isnotempty())
                        <div class="col-md-12 my-4">
                            <h5 class="text-theme-color">सम्बन्धित कागजातहरु:</h5>
                            <ul class="list-group list-group-flush">
                                @php
                                    $documents = $provincialAssemblyLibrary->documents()->latest()->get();
                                @endphp
                                @foreach ($provincialAssemblyLibrary->documents as $provincialAssemblyLibraryDocument)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div><i class="far fa-file-alt"></i> {{ $provincialAssemblyLibraryDocument->name }}
                                        </div>

                                        <a href="{{ asset('storage/' . $provincialAssemblyLibraryDocument->file) }}"
                                            class="btn btn-primary text-xl" target="_blank"><i
                                                class="fas fa-cloud-download-alt"></i> डाउनलोड</a>

                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        {{-- <div>
                            @foreach ($provincialAssemblyLibrary->documents as $provincialAssemblyLibraryDocument)
                            <div class="my-3">
                                <object data="{{ asset('storage/' . $provincialAssemblyLibraryDocument->file) }}" type="application/pdf"
                                    width="100%" height="800">
                                    <p>Unable to display PDF file. <a
                                            href="{{ asset('storage/' . $provincialAssemblyLibraryDocument->file) }}">Download</a>
                                    </p>
                                </object>
                            </div>
                            @endforeach
                        </div> --}}
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                @include('frontend.layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
