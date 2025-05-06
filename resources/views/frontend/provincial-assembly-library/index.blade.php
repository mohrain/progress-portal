@extends('frontend.layouts.app', ['title' => __("प्रदेश सभा पुस्तकालय")])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="frontend-title">
                        कार्यपालिका पुस्तकालय
                        <hr>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-md table-bordered">
                                    <thead>
                                        <th>दर्ता नं.</th>
                                        <th>किताब</th>
                                        <th>कभर फोटो</th>
                                        <th>लेखक</th>
                                    </thead>
                                    <tbody>
                                        @forelse($provincialAssemblyLibraries as $provincialAssemblyLibrary)
                                        <tr>
                                            <td>{{ $provincialAssemblyLibrary->entry_no }}</td>
                                            <td>
                                                <a class="dropdown-item "
                                                    href="{{ route('provincial-assembly-library.show', $provincialAssemblyLibrary) }}">
                                                    {{ $provincialAssemblyLibrary->title }}
                                                </a>
                                            </td>
                                            <td>
                                                <img id="newProfilePhotoPreview"
                                                    src="{{ $provincialAssemblyLibrary->cover_image ? asset('storage/' . $provincialAssemblyLibrary->cover_image) : asset('assets/img/no-image.png') }}"
                                                    class="feature-image card-img-top">
                                            </td>
                                            <td>{{ $provincialAssemblyLibrary->author }}</td>
                                        </tr>

                                        @empty
                                        <tr>
                                            <td colspan="42" class="font-italic text-center">कुनैपनि डाटा उपलब्ध
                                                छैन !!!
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>


                                </table>
                            </div>
                            {{ $provincialAssemblyLibraries->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @include('frontend.layouts.sidebar')
        </div>
    </div>
</div>
@endsection