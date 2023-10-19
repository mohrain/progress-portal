@extends('layouts.app', ['title' => __('कर्मचारीको विवरण')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'कर्मचारीको विवरण' }}
                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ $employee->id ? route('employees.update', $employee) : route('employees.store') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($employee->id)
                                @method('put')
                            @endif
                            <div class="row">
                                <div class="col-md-9 order-lg-0 order-1">
                                    <div class="row">
                                        {{-- <div class="col-md-4 mb-2">
                                           <x-employee-designation-select :employee="$employee" />
                                        </div> --}}
                                        <div class="col-md-4 mb-2">
                                            <label for="name" class="form-label required">नाम</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', $employee->name) }}" id="name"
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
                                                value="{{ old('name_english', $employee->name_english) }}" id="name_english"
                                                aria-describedby="name_english">
                                            <div class="invalid-feedback">
                                                @error('name_english')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="designation"
                                                class="form-label text-md-end required">{{ __('पद') }}</label>
                                            <input type="text" name="designation"
                                                class="form-control @error('designation') is-invalid @enderror"
                                                value="{{ old('designation', $employee->designation) }}" id="designation"
                                                aria-describedby="designation">

                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="branch"
                                                class="form-label text-md-end">{{ __('शाखा / महाशाखा') }}</label>
                                            <input type="text" name="branch"
                                                class="form-control @error('branch') is-invalid @enderror"
                                                value="{{ old('branch', $employee->branch) }}" id="branch"
                                                aria-describedby="branch">

                                            @error('branch')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 mb-2">
                                            <label for="gender"
                                                class="form-label text-md-end required">{{ __('लिङ्ग') }}</label>

                                            <select class="form-control @error('gender') is-invalid @enderror"
                                                name="gender" id="gender">
                                                <option value="पुरुष"
                                                    {{ old('gender', $employee->gender) == 'पुरुष' ? 'selected' : '' }}>
                                                    पुरुष
                                                </option>
                                                <option value="महिला"
                                                    {{ old('gender', $employee->gender) == 'महिला' ? 'selected' : '' }}>
                                                    महिला
                                                </option>
                                                <option value="अन्य"
                                                    {{ old('gender', $employee->gender) == 'अन्य' ? 'selected' : '' }}>
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
                                            <label for="email"
                                                class="form-label text-md-end">{{ __('इमेल') }}</label>
                                            <input id="name" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email', $employee->email) }}" autocomplete="email"
                                                placeholder="example@domin.com">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="mobile"
                                                class="form-label text-md-end required">{{ __('मोबाइल नं.') }}</label>
                                            <input id="name" type="tel"
                                                class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                                value="{{ old('mobile', $employee->mobile) }}" autocomplete="mobile"
                                                placeholder="9xxxxxxxxx">
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="dob" class="form-label required">जन्म मिति</label>
                                            <input type="text" name="dob"
                                                class="form-control @error('dob') is-invalid @enderror"
                                                value="{{ old('dob', $employee->dob) }}" id="dob"
                                                aria-describedby="dob">
                                            <div class="invalid-feedback">
                                                @error('dob')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="education" class="form-label">शिक्षा</label>
                                            <input type="text" name="education"
                                                class="form-control @error('education') is-invalid @enderror"
                                                value="{{ old('education', $employee->education) }}" id="education"
                                                aria-describedby="education">
                                            <div class="invalid-feedback">
                                                @error('education')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-3 text-center order-lg-1 order-0 my-auto">
                                    <div class="mb-2">
                                        <label for="newProfilePhoto" class="form-label required">प्रोफाइल फोटो (< 2 MB
                                                photo) </label>
                                                <div class="mb-2 align-self-center">
                                                    <img id="newProfilePhotoPreview"
                                                        src="{{ $employee->profile ? asset('storage/' . $employee->profile) : asset('assets/img/no-image.png') }}"
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
                                            <label for="permanent_address_district"
                                                class="form-label text-md-end required">{{ __('स्थाई जिल्ला') }}</label>
                                            <select
                                                class="form-control @error('permanent_address_district') is-invalid @enderror"
                                                name="permanent_address_district" id="permanent_address_district">
                                                <option value="" selected disabled>स्थाई जिल्ला छान्नुहोस्</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->name }}"
                                                        {{ old('permanent_address_district', $employee->permanent_address_district) == $district->name ? 'selected' : '' }}>
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
                                                value="{{ old('permanent_address', $employee->permanent_address) }}"
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
                                                        {{ old('temporary_address_district', $employee->temporary_address_district) == $district->name ? 'selected' : '' }}>
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
                                                value="{{ old('temporary_address', $employee->temporary_address) }}"
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
                                                value="{{ old('father_name', $employee->father_name) }}" id="father_name"
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
                                                value="{{ old('mother_name', $employee->mother_name) }}" id="mother_name"
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
                                                value="{{ old('spouse_name', $employee->spouse_name) }}" id="spouse_name"
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
                                                value="{{ old('child', $employee->child) }}" id="child"
                                                aria-describedby="child">
                                            <div class="invalid-feedback">
                                                @error('child')
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
                                                    {{ $employee->religion == 'हिन्दु' ? 'selected' : '' }}>
                                                    हिन्दु
                                                </option>
                                                <option value="क्रिस्चियन"
                                                    {{ $employee->religion == 'क्रिस्चियन' ? 'selected' : '' }}>
                                                    क्रिस्चियन
                                                </option>
                                                <option value="मुस्लिम"
                                                    {{ $employee->religion == 'मुस्लिम' ? 'selected' : '' }}>
                                                    मुस्लिम
                                                </option>
                                                <option value="बौद्ध"
                                                    {{ $employee->religion == 'बौद्ध' ? 'selected' : '' }}>
                                                    बौद्ध
                                                </option>
                                                <option value="अन्य"
                                                    {{ $employee->religion == 'अन्य' ? 'selected' : '' }}>
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
                                                    {{ old('mother_tongue', $employee->mother_tongue) == 'नेपाली' ? 'selected' : '' }}>
                                                    नेपाली
                                                </option>
                                                <option value="थारु"
                                                    {{ old('mother_tongue', $employee->mother_tongue) == 'थारु' ? 'selected' : '' }}>
                                                    थारु
                                                </option>
                                                <option value="मैथली"
                                                    {{ old('mother_tongue', $employee->mother_tongue) == 'मैथली' ? 'selected' : '' }}>
                                                    मैथली
                                                </option>
                                                <option value="राई"
                                                    {{ old('mother_tongue', $employee->mother_tongue) == 'राई' ? 'selected' : '' }}>
                                                    राई
                                                </option>
                                                <option value="लिम्बु"
                                                    {{ old('mother_tongue', $employee->mother_tongue) == 'लिम्बु' ? 'selected' : '' }}>
                                                    लिम्बु
                                                </option>
                                                <option value="गुरुङ"
                                                    {{ old('mother_tongue', $employee->mother_tongue) == 'गुरुङ' ? 'selected' : '' }}>
                                                    गुरुङ
                                                </option>
                                                <option value="भोजपुरी"
                                                    {{ old('mother_tongue', $employee->mother_tongue) == 'भोजपुरी' ? 'selected' : '' }}>
                                                    भोजपुरी
                                                </option>
                                                <option value="अन्य"
                                                    {{ old('mother_tongue', $employee->mother_tongue) == 'अन्य' ? 'selected' : '' }}>
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
                                        <textarea name="descriptions" class="" id="summernote" cols="30" rows="10">{!! old('descriptions', $employee->descriptions) !!}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 order-lg-5 order-5 mb-2 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $employee->id ? 'सम्पादन' : 'सुरक्षित' }}</button>
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
