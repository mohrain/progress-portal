@extends('frontend.layouts.app', ['title' => __('सदस्यहरु')])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="frontend-title">
                            प्रदेश सभा सदस्यहरु
                            <hr>
                        </div>
                        <div class="box p-3">
                            @if (Route::currentRouteName() == 'members.frontendIndex' || Route::currentRouteName() == 'members.frontendSearch')
                                <form action="{{ route('members.frontendSearch') }}" method="get">
                                @else
                                    <form action="{{ route('members.frontendOldSearch') }}" method="get">
                            @endif
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name" class="form-label ">नाम</label>
                                    <input list="names" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        aria-describedby="name" style="font-size: 15px;">

                                    <datalist id="names">
                                        @forelse ($members as $member)
                                            <option value="{{ $member->name }}">
                                            @empty
                                                <div class="font-italic text-center">
                                                    कुनैपनि डाटा उपलब्ध छैन !!!
                                                </div>
                                        @endforelse

                                    </datalist>


                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="name_english" class="form-label ">English
                                        Name</label>
                                    <input list="names_english" name="name_english"
                                        class="form-control @error('name_english') is-invalid @enderror" value=""
                                        id="name_english" aria-describedby="name_english" style="font-size: 15px;">
                                    <datalist id="names_english">
                                        @forelse ($members as $member)
                                            <option value="{{ $member->name_english }}">
                                            @empty
                                                <div class="font-italic text-center">
                                                    कुनैपनि डाटा उपलब्ध छैन !!!
                                                </div>
                                        @endforelse
                                        </datalis>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <x-parliamentery-party-view />
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="election_process"
                                        class="form-label text-md-end ">{{ __('निर्वाचन प्रणाली') }}</label>

                                    <select class="form-control @error('election_process') is-invalid @enderror"
                                        name="election_process" id="election_process">
                                        <option value="">सबै</option>

                                        <option value="प्रत्यक्षे">
                                            प्रत्यक्षे
                                        </option>
                                        <option value="समनुपातिक">
                                            समनुपातिक
                                        </option>
                                        <option value="मनोनित">
                                            मनोनित
                                        </option>
                                    </select>
                                    @error('election_process')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="election_district"
                                        class="form-label text-md-end ">{{ __('जिल्ला') }}</label>

                                    <select class="form-control @error('election_district') is-invalid @enderror"
                                        name="election_district" id="election_district">
                                        <option value="">सबै</option>

                                        @foreach ($districts as $district)
                                            <option value="{{ $district->name }}">
                                                {{ $district->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('election_district')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label for="gender" class="form-label text-md-end ">{{ __('लिङ्ग') }}</label>

                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender"
                                        id="gender">
                                        <option value="">सबै</option>

                                        <option value="पुरुष">
                                            पुरुष
                                        </option>
                                        <option value="महिला">
                                            महिला
                                        </option>
                                        <option value="अन्य">
                                            अन्य
                                        </option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-md-auto mb-3 text-end">
                                    <button type="submit" class="btn btn-primary bi bi-search">
                                        खोजी गर्नुहोस्
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive box p-2">
                        <table class="table table-bordered" style="white-space: nowrap;">
                            <thead>
                                <th>फोटो</th>
                                <th>परिचय</th>
                            </thead>
                            <tbody id="sortable-member">
                                @forelse($members as $member)
                                    <tr data-id="{{ $member->id }}" data-order="{{ $member->position ?? 0 }}">
                                        <td class="sort-handle">
                                            <img id="newProfilePhotoPreview"
                                                src="{{ $member->profile ? asset('storage/' . $member->profile) : asset('assets/img/no-image.png') }}"
                                                class="profile-nav">
                                        </td>
                                        <td>
                                            <a href="{{ route('members.show', $member) }}" class="link-dark">
                                                @php
                                                    $officeBearer = $member
                                                        ->officeBearers()
                                                        ->latest()
                                                        ->first();
                                                @endphp
                                                <div>
                                                    {{ $officeBearer ? ($officeBearer->designation == true ? '' : '') :  "मा." }} {{ $member->name }}
                                                </div>
                                                <div>
                                                    {{ $officeBearer ? ($officeBearer->designation == true ? 'माननीय सभामुख' : 'माननीय उपसभामुख') : $member->parliamentaryParty->name }}
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="42" class="font-italic text-center">कुनैपनि डाटा उपलब्ध छैन
                                            !!!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>


                        </table>
                    </div>

                    {{ $members->links() }}
                </div>
            </div>
            <div class="col-md-3">
                @include('frontend.layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
