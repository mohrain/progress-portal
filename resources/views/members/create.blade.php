@extends('layouts.app', ['title' => __('सदस्य')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'सदस्य' }}
                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ $member->id ? route('members.update', $member) : route('members.store') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($member->id)
                                @method('put')
                            @endif
                            <div class="row">
                                <div class="col-md-9 order-lg-0 order-1">
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <x-election-year-select :member="$member" />
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <x-parliamentery-party-view :member="$member" />
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="election_process"
                                                class="form-label text-md-end required">{{ __('निर्वाचन प्रणाली') }}</label>

                                            <select class="form-control @error('election_process') is-invalid @enderror"
                                                name="election_process" id="election_process">
                                                <option value="">छान्नुहोस्</option>

                                                <option value="प्रत्यक्षे"
                                                    {{ old('election_process', $member->election_process) == 'प्रत्यक्षे' ? 'selected' : '' }}>
                                                    प्रत्यक्षे
                                                </option>
                                                <option value="समनुपातिक"
                                                    {{ old('election_process', $member->election_process) == 'समनुपातिक' ? 'selected' : '' }}>
                                                    समनुपातिक
                                                </option>
                                                <option value="मनोनित"
                                                    {{ old('election_process', $member->election_process) == 'मनोनित' ? 'selected' : '' }}>
                                                    मनोनित
                                                </option>
                                            </select>
                                            @error('election_process')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="election_district"
                                                class="form-label text-md-end required">{{ __('निर्वाचन जिल्ला') }}</label>

                                            <select class="form-control @error('election_district') is-invalid @enderror"
                                                name="election_district" id="election_district">
                                                <option value="">छान्नुहोस्</option>

                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->name }}"
                                                        {{ old('election_district', $member->election_district) == $district->name ? 'selected' : '' }}>
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
                                        <div class="col-md-4 mb-2">
                                            <label for="election_area" class="form-label required">निर्वाचन क्षेत्र
                                                नं.</label>
                                            <input type="text" name="election_area"
                                                class="form-control @error('election_area') is-invalid @enderror"
                                                value="{{ old('election_area', $member->election_area) }}"
                                                id="election_area" aria-describedby="election_area">
                                            <div class="invalid-feedback">
                                                @error('election_area')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="designation"
                                                class="form-label text-md-end required">{{ __('पद') }}</label>

                                            <select class="form-control @error('designation') is-invalid @enderror"
                                                name="designation" id="designation">
                                                <option value="">छान्नुहोस्</option>

                                                <option value="सदस्य"
                                                    {{ old('designation', $member->designation) == 'सदस्य' ? 'selected' : '' }}>
                                                    सदस्य
                                                </option>
                                                <option value="सभामुख"
                                                    {{ old('designation', $member->designation) == 'सभामुख' ? 'selected' : '' }}>
                                                    सभामुख
                                                </option>
                                                <option value="उपसभामुख"
                                                    {{ old('designation', $member->designation) == 'उपसभामुख' ? 'selected' : '' }}>
                                                    उपसभामुख
                                                </option>
                                            </select>
                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="name" class="form-label required">नाम</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', $member->name) }}" id="name"
                                                aria-describedby="name">
                                            <div class="invalid-feedback">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-2">
                                            <label for="name_english" class="form-label required">English Name</label>
                                            <input type="text" name="name_english"
                                                class="form-control @error('name_english') is-invalid @enderror"
                                                value="{{ old('name_english', $member->name_english) }}" id="name_english"
                                                aria-describedby="name_english">
                                            <div class="invalid-feedback">
                                                @error('name_english')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="gender"
                                                class="form-label text-md-end required">{{ __('लिङ्ग') }}</label>

                                            <select class="form-control @error('gender') is-invalid @enderror"
                                                name="gender" id="gender">
                                                <option value="पुरुष"
                                                    {{ old('gender', $member->gender) == 'पुरुष' ? 'selected' : '' }}>
                                                    पुरुष
                                                </option>
                                                <option value="महिला"
                                                    {{ old('gender', $member->gender) == 'महिला' ? 'selected' : '' }}>
                                                    महिला
                                                </option>
                                                <option value="अन्य"
                                                    {{ old('gender', $member->gender) == 'अन्य' ? 'selected' : '' }}>
                                                    अन्य
                                                </option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 mb-2">
                                            <label for="dob" class="form-label required">जन्म मिति</label>
                                            <input type="text" name="dob"
                                                class="form-control @error('dob') is-invalid @enderror"
                                                value="{{ old('dob', $member->dob) }}" id="dob"
                                                aria-describedby="dob">
                                            <div class="invalid-feedback">
                                                @error('dob')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="birth_place"
                                                class="form-label text-md-end required">{{ __('जन्म स्थान') }}</label>
                                            <input id="birth_place" type="text"
                                                class="form-control @error('birth_place') is-invalid @enderror"
                                                name="birth_place" value="{{ old('birth_place', $member->birth_place) }}"
                                                autocomplete="birth_place">
                                            @error('birth_place')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="email"
                                                class="form-label text-md-end">{{ __('इमेल') }}</label>
                                            <input id="name" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email', $member->email) }}" autocomplete="email"
                                                placeholder="example@domin.com">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-3 text-center order-lg-1 order-0 my-auto">
                                    <div class="mb-2">
                                        <label for="newProfilePhoto" class="form-label required">प्रोफाइल फोटो (< 2 MB
                                                photo) </label>
                                                <div class="mb-2 align-self-center">
                                                    <img id="newProfilePhotoPreview"
                                                        src="{{ $member->profile ? asset('storage/' . $member->profile) : asset('assets/img/no-image.png') }}"
                                                        class="feature-image">
                                                    <div class="edit-profile mx-md-6 my-2">
                                                        <label class="btn btn-secondary "
                                                            for="newProfilePhoto">छान्नुहोस्</label>
                                                        <input type="file" id="newProfilePhoto" name="profile"
                                                            class="" accept="image/*" hidden>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                                <div class=" col-md-12  order-lg-2 order-2">
                                    <div class="row">
                                        <div class="col-md-3 mb-2">
                                            <label for="mobile"
                                                class="form-label text-md-end required">{{ __('मोबाइल नं.') }}</label>
                                            <input id="name" type="tel"
                                                class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                                value="{{ old('mobile', $member->mobile) }}" autocomplete="mobile"
                                                placeholder="9xxxxxxxxx">
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="resident_contact_numbe"
                                                class="form-label text-md-end required">{{ __('निवास सम्पर्क नं.') }}</label>
                                            <input id="name" type="tel"
                                                class="form-control @error('resident_contact_numbe') is-invalid @enderror"
                                                name="resident_contact_numbe"
                                                value="{{ old('resident_contact_numbe', $member->resident_contact_numbe) }}"
                                                autocomplete="resident_contact_numbe" placeholder="9xxxxxxxxx">
                                            @error('resident_contact_numbe')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="permanent_address_district"
                                                class="form-label text-md-end required">{{ __('स्थाई जिल्ला') }}</label>
                                            <select
                                                class="form-control @error('permanent_address_district') is-invalid @enderror"
                                                name="permanent_address_district" id="permanent_address_district">
                                                <option value="" selected disabled>स्थाई जिल्ला छान्नुहोस्</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->name }}"
                                                        {{ old('permanent_address_district', $member->permanent_address_district) == $district->name ? 'selected' : '' }}>
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('permanent_address_district')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="permanent_address"
                                                class="form-label text-md-end required">{{ __('स्थाई ठेगाना') }}</label>
                                            <input id="permanent_address" type="text"
                                                class="form-control @error('permanent_address') is-invalid @enderror"
                                                name="permanent_address"
                                                value="{{ old('permanent_address', $member->permanent_address) }}"
                                                autocomplete="permanent_address">
                                            @error('permanent_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="temporary_address_district"
                                                class="form-label text-md-end">{{ __('अस्थायी जिल्ला') }}</label>
                                            <select
                                                class="form-control @error('temporary_address_district') is-invalid @enderror"
                                                name="temporary_address_district" id="temporary_address_district">
                                                <option value="" selected disabled>अस्थायी जिल्ला छान्नुहोस्</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->name }}"
                                                        {{ old('temporary_address_district', $member->temporary_address_district) == $district->name ? 'selected' : '' }}>
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('temporary_address_district')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="temporary_address"
                                                class="form-label text-md-end">{{ __('अस्थायी ठेगाना') }}</label>
                                            <input id="temporary_address" type="text"
                                                class="form-control @error('temporary_address') is-invalid @enderror"
                                                name="temporary_address"
                                                value="{{ old('temporary_address', $member->temporary_address) }}"
                                                autocomplete="temporary_address">
                                            @error('temporary_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="father_name" class="form-label required">बुवाको नाम</label>
                                            <input type="text" name="father_name"
                                                class="form-control @error('father_name') is-invalid @enderror"
                                                value="{{ old('father_name', $member->father_name) }}" id="father_name"
                                                aria-describedby="father_name">
                                            <div class="invalid-feedback">
                                                @error('father_name')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="mother_name" class="form-label required">आमाको नाम</label>
                                            <input type="text" name="mother_name"
                                                class="form-control @error('mother_name') is-invalid @enderror"
                                                value="{{ old('mother_name', $member->mother_name) }}" id="mother_name"
                                                aria-describedby="mother_name">
                                            <div class="invalid-feedback">
                                                @error('mother_name')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="spouse_name" class="form-label ">पति/पत्निको नाम</label>
                                            <input type="text" name="spouse_name"
                                                class="form-control @error('spouse_name') is-invalid @enderror"
                                                value="{{ old('spouse_name', $member->spouse_name) }}" id="spouse_name"
                                                aria-describedby="spouse_name">
                                            <div class="invalid-feedback">
                                                @error('spouse_name')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="child" class="form-label">सन्तान</label>
                                            <input type="text" name="child"
                                                class="form-control @error('child') is-invalid @enderror"
                                                value="{{ old('child', $member->child) }}" id="child"
                                                aria-describedby="child">
                                            <div class="invalid-feedback">
                                                @error('child')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="education" class="form-label">शिक्षा</label>
                                            <input type="text" name="education"
                                                class="form-control @error('education') is-invalid @enderror"
                                                value="{{ old('education', $member->education) }}" id="education"
                                                aria-describedby="education">
                                            <div class="invalid-feedback">
                                                @error('education')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="religion"
                                                class="form-label text-md-end">{{ __('धर्म') }}</label>
                                            <select class="form-control @error('religion') is-invalid @enderror"
                                                name="religion" id="religion">
                                                <option value="" selected disabled>छान्नुहोस्</option>
                                                <option value="हिन्दु"
                                                    {{ $member->religion == 'हिन्दु' ? 'selected' : '' }}>
                                                    हिन्दु
                                                </option>
                                                <option value="क्रिस्चियन"
                                                    {{ $member->religion == 'क्रिस्चियन' ? 'selected' : '' }}>
                                                    क्रिस्चियन
                                                </option>
                                                <option value="मुस्लिम"
                                                    {{ $member->religion == 'मुस्लिम' ? 'selected' : '' }}>
                                                    मुस्लिम
                                                </option>
                                                <option value="बौद्ध"
                                                    {{ $member->religion == 'बौद्ध' ? 'selected' : '' }}>
                                                    बौद्ध
                                                </option>
                                                <option value="अन्य"
                                                    {{ $member->religion == 'अन्य' ? 'selected' : '' }}>
                                                    अन्य
                                                </option>

                                            </select>
                                            @error('religion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="mother_tongue"
                                                class="form-label text-md-end">{{ __('मातृभाषा') }}</label>
                                            <select class="form-control @error('mother_tongue') is-invalid @enderror"
                                                name="mother_tongue" id="mother_tongue">
                                                <option value="" selected disabled>छान्नुहोस्</option>
                                                <option value="नेपाली"
                                                    {{ old('mother_tongue', $member->mother_tongue) == 'नेपाली' ? 'selected' : '' }}>
                                                    नेपाली
                                                </option>
                                                <option value="थारु"
                                                    {{ old('mother_tongue', $member->mother_tongue) == 'थारु' ? 'selected' : '' }}>
                                                    थारु
                                                </option>
                                                <option value="मैथली"
                                                    {{ old('mother_tongue', $member->mother_tongue) == 'मैथली' ? 'selected' : '' }}>
                                                    मैथली
                                                </option>
                                                <option value="राई"
                                                    {{ old('mother_tongue', $member->mother_tongue) == 'राई' ? 'selected' : '' }}>
                                                    राई
                                                </option>
                                                <option value="लिम्बु"
                                                    {{ old('mother_tongue', $member->mother_tongue) == 'लिम्बु' ? 'selected' : '' }}>
                                                    लिम्बु
                                                </option>
                                                <option value="गुरुङ"
                                                    {{ old('mother_tongue', $member->mother_tongue) == 'गुरुङ' ? 'selected' : '' }}>
                                                    गुरुङ
                                                </option>
                                                <option value="भोजपुरी"
                                                    {{ old('mother_tongue', $member->mother_tongue) == 'भोजपुरी' ? 'selected' : '' }}>
                                                    भोजपुरी
                                                </option>
                                                <option value="अन्य"
                                                    {{ old('mother_tongue', $member->mother_tongue) == 'अन्य' ? 'selected' : '' }}>
                                                    अन्य
                                                </option>

                                            </select>
                                            @error('mother_tongue')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 order-lg-4 order-4">
                                    <div class="mb-2">
                                        <label for="summernote" class="form-label required">विवरण</label>
                                        <textarea name="descriptions" class="" id="summernote" cols="30" rows="10">{!! old('descriptions', $member->descriptions) !!}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 order-lg-5 order-5 mb-2 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $member->id ? 'सम्पादन' : 'सुरक्षित' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            /* Select your element */
            var elm = document.getElementById("dob");
            /* Initialize Datepicker with options */
            elm.nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                ndpYearCount: 200,
                readOnlyInput: true
            });
        </script>
        <script>
            function readNewProfilePhotoUrl(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('newProfilePhotoPreview').setAttribute('src', e.target.result);
                        initializeCroppie();
                        openNewPicWindow();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            var newProfilePhoto = document.getElementById('newProfilePhoto');
            newProfilePhoto.addEventListener('change', function() {
                console.log('Profile photo selected');
                readNewProfilePhotoUrl(this);
            });
        </script>
    @endpush
@endsection
