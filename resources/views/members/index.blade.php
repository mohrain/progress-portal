@extends('layouts.app', ['title' => __('सदस्यहरु')])

@section('content')
    @push('styles')
        <style>
            .sortable-placeholder {
                border: 2px dashed #4285f4;
                height: 35px;
            }

            .sort-handle:hover {
                cursor: pointer;
            }
        </style>
    @endpush
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'सदस्यहरु' }}
                            </div>
                            <div>
                                <a href="{{ route('members.create') }}" class="btn btn-sm btn-primary bi bi-plus">नयाँ
                                    सदस्यदर्ता</a>
                                <a class="btn btn-secondary bi bi-funnel " data-toggle="collapse" href="#collapseExample"
                                    role="button" aria-expanded="false" aria-controls="collapseExample">
                                    फिल्टर
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="collapse my-2" id="collapseExample">
                            <div class="card card-body">
                                <form action="{{ route('members.search') }}" method="get">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3 mb-2">
                                                    <x-election-year-select />
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <x-parliamentery-party-view />
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="election_process"
                                                        class="form-label text-md-end ">{{ __('निर्वाचन प्रणाली') }}</label>

                                                    <select
                                                        class="form-control @error('election_process') is-invalid @enderror"
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
                                                        class="form-label text-md-end ">{{ __('निर्वाचन जिल्ला') }}</label>

                                                    <select
                                                        class="form-control @error('election_district') is-invalid @enderror"
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
                                                    <label for="election_area" class="form-label ">निर्वाचन
                                                        क्षेत्र
                                                        नं.</label>
                                                    <input type="text" name="election_area"
                                                        class="form-control @error('election_area') is-invalid @enderror"
                                                        value="" id="election_area" aria-describedby="election_area">
                                                    <div class="invalid-feedback">
                                                        @error('election_area')
                                                            {{ $message }}
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-3 mb-2">
                                                    <label for="name" class="form-label ">नाम</label>
                                                    <input type="text" name="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" aria-describedby="name">
                                                    <div class="invalid-feedback">
                                                        @error('name')
                                                            {{ $message }}
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-3 mb-2">
                                                    <label for="name_english" class="form-label ">English
                                                        Name</label>
                                                    <input type="text" name="name_english"
                                                        class="form-control @error('name_english') is-invalid @enderror"
                                                        value="" id="name_english" aria-describedby="name_english">
                                                    <div class="invalid-feedback">
                                                        @error('name_english')
                                                            {{ $message }}
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="gender"
                                                        class="form-label text-md-end ">{{ __('लिङ्ग') }}</label>

                                                    <select class="form-control @error('gender') is-invalid @enderror"
                                                        name="gender" id="gender">
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


                                                <div class="col-md-3 mb-2">
                                                    <label for="email"
                                                        class="form-label text-md-end">{{ __('इमेल') }}</label>
                                                    <input id="name" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="" autocomplete="email"
                                                        placeholder="example@domin.com">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>





                                                <div class="col-md-3 mb-2">
                                                    <label for="mobile"
                                                        class="form-label text-md-end ">{{ __('मोबाइल नं.') }}</label>
                                                    <input id="name" type="tel"
                                                        class="form-control @error('mobile') is-invalid @enderror"
                                                        name="mobile" value="" autocomplete="mobile"
                                                        placeholder="9xxxxxxxxx">
                                                    @error('mobile')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="resident_contact_numbe"
                                                        class="form-label text-md-end ">{{ __('निवास सम्पर्क नं.') }}</label>
                                                    <input id="name" type="tel"
                                                        class="form-control @error('resident_contact_numbe') is-invalid @enderror"
                                                        name="resident_contact_numbe" value=""
                                                        autocomplete="resident_contact_numbe" placeholder="9xxxxxxxxx">
                                                    @error('resident_contact_numbe')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="dob" class="form-label ">जन्म
                                                        मिति</label>
                                                    <input type="text" name="dob"
                                                        class="form-control @error('dob') is-invalid @enderror"
                                                        value="" id="dob" aria-describedby="dob">
                                                    <div class="invalid-feedback">
                                                        @error('dob')
                                                            {{ $message }}
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="birth_place"
                                                        class="form-label text-md-end ">{{ __('जन्म स्थान') }}</label>
                                                    <input id="birth_place" type="text"
                                                        class="form-control @error('birth_place') is-invalid @enderror"
                                                        name="birth_place" value="" autocomplete="birth_place">
                                                    @error('birth_place')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="permanent_address_district"
                                                        class="form-label text-md-end ">{{ __('स्थाई जिल्ला') }}</label>
                                                    <select
                                                        class="form-control @error('permanent_address_district') is-invalid @enderror"
                                                        name="permanent_address_district" id="permanent_address_district">
                                                        <option value="" selected disabled>स्थाई जिल्ला
                                                            छान्नुहोस्</option>
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->name }}">
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
                                                        class="form-label text-md-end ">{{ __('स्थाई ठेगाना') }}</label>
                                                    <input id="permanent_address" type="text"
                                                        class="form-control @error('permanent_address') is-invalid @enderror"
                                                        name="permanent_address" value=""
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
                                                        <option value="" selected disabled>अस्थायी जिल्ला
                                                            छान्नुहोस्</option>
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->name }}">
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
                                                        name="temporary_address" value=""
                                                        autocomplete="temporary_address">
                                                    @error('temporary_address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="father_name" class="form-label ">बुवाको
                                                        नाम</label>
                                                    <input type="text" name="father_name"
                                                        class="form-control @error('father_name') is-invalid @enderror"
                                                        value="" id="father_name" aria-describedby="father_name">
                                                    <div class="invalid-feedback">
                                                        @error('father_name')
                                                            {{ $message }}
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="mother_name" class="form-label ">आमाको
                                                        नाम</label>
                                                    <input type="text" name="mother_name"
                                                        class="form-control @error('mother_name') is-invalid @enderror"
                                                        value="" id="mother_name" aria-describedby="mother_name">
                                                    <div class="invalid-feedback">
                                                        @error('mother_name')
                                                            {{ $message }}
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label for="spouse_name" class="form-label ">पति/पत्निको
                                                        नाम</label>
                                                    <input type="text" name="spouse_name"
                                                        class="form-control @error('spouse_name') is-invalid @enderror"
                                                        value="" id="spouse_name" aria-describedby="spouse_name">
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
                                                        value="" id="child" aria-describedby="child">
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
                                                        value="" id="education" aria-describedby="education">
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
                                                        <option value="हिन्दु">
                                                            हिन्दु
                                                        </option>
                                                        <option value="क्रिस्चियन">
                                                            क्रिस्चियन
                                                        </option>
                                                        <option value="मुस्लिम">
                                                            मुस्लिम
                                                        </option>
                                                        <option value="बौद्ध">
                                                            बौद्ध
                                                        </option>
                                                        <option value="अन्य">
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
                                                    <select
                                                        class="form-control @error('mother_tongue') is-invalid @enderror"
                                                        name="mother_tongue" id="mother_tongue">
                                                        <option value="" selected disabled>छान्नुहोस्</option>
                                                        <option value="नेपाली">
                                                            नेपाली
                                                        </option>
                                                        <option value="थारु">
                                                            थारु
                                                        </option>
                                                        <option value="मैथली">
                                                            मैथली
                                                        </option>
                                                        <option value="राई">
                                                            राई
                                                        </option>
                                                        <option value="लिम्बु">
                                                            लिम्बु
                                                        </option>
                                                        <option value="गुरुङ">
                                                            गुरुङ
                                                        </option>
                                                        <option value="भोजपुरी">
                                                            भोजपुरी
                                                        </option>
                                                        <option value="अन्य">
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
                                        <div class="col-md-12 mt-md-auto mb-3 text-right">
                                            <button type="submit" class="btn btn-primary bi bi-search">
                                                खोजी गर्नुहोस्
                                            </button>
                                        </div>



                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" style="white-space: nowrap;">
                                <thead>
                                    <th>फोटो</th>
                                    <th>नाम</th>
                                    <th>निर्वाचन</th>
                                    <th>राजनितिक दल</th>
                                    <th>लिङ्ग</th>
                                    <th>सम्पर्क</th>
                                    <th>जन्म मिति</th>
                                    <th>ठेगाना</th>
                                    <th>बाबु/आमाको नाम</th>
                                    <th></th>
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
                                                <div>
                                                    {{ $member->name }}
                                                </div>
                                                <div>
                                                    {{ $member->name_english }}
                                                </div>
                                            </td>
                                            <td>
                                                <div> {{ $member->election->name }}</div>
                                                <div>{{ $member->election_district }}, {{ $member->election_area }}
                                                </div>

                                            </td>
                                            <td>
                                                <div> {{ $member->parliamentaryParty->name }}</div>
                                                <div> ({{ $member->election_process }})</div>
                                            </td>
                                            <td>
                                                {{ $member->gender }}
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $member->mobile }}
                                                </div>
                                                <div>
                                                    {{ $member->email }}
                                                </div>
                                            </td>
                                            <td style="white-space: nowrap;">{{ $member->dob }}</td>

                                            <td>
                                                <div style="white-space: nowrap;">
                                                    <b>स्थाई :</b> {{ $member->permanent_address }},
                                                    {{ $member->permanent_address_district }}
                                                </div>
                                                <div style="white-space: nowrap;">
                                                    <b>अस्थायी :</b> {{ $member->temporary_address }},
                                                    {{ $member->temporary_address_district }}
                                                </div>
                                            </td>
                                         
                                            <td>
                                                <div>
                                                    {{ $member->father_name }}
                                                </div>
                                                <div>
                                                    {{ $member->mother_name }}
                                                </div>
                                            </td>

                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class=" btn-icon-only text-light" href="#" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        <a class="dropdown-item "
                                                            href="{{ route('members.show', $member) }}">Show</a>

                                                        <a class="dropdown-item "
                                                            href="{{ route('members.edit', $member) }}">Edit</a>

                                                        <form action="{{ route('members.destroy', $member) }}"
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
                                            <td colspan="42" class="font-italic text-center">कुनैपनि डाटा उपलब्ध छैन
                                                !!!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>


                            </table>
                        </div>
                        <button id="update-menu-order-btn" type="button" class="btn btn-primary mx-0 mt-3">
                            क्रमबद्ध मिलाउनुहोस्
                        </button>
                        {{ $members->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(function() {
                // Sorting
                $('#sortable-member').sortable({
                    handle: '.sort-handle',
                    placeholder: 'sortable-placeholder',
                    update: function(event, ui) {
                        $(this).children().each(function(index) {
                            if ($(this).attr('data-order') != (index + 1)) {
                                $(this).attr('data-order', (index + 1)).addClass('order-updated');
                            }
                        });
                    }
                });

                function persistUpdatedOrder() {
                    var members = [];
                    $('.order-updated').each(function() {
                        members.push({
                            id: $(this).attr('data-id'),
                            position: $(this).attr('data-order')
                        });
                    });
                    console.table(members);
                    axios({
                        method: 'put',
                        url: "{{ route('members.sort') }}",
                        data: {
                            members: members,
                        }
                    }).then(function(response) {
                        console.log(response);
                        if (response.status == 200) {
                            // showAlert('default', response.data.message);
                        }
                    });
                }

                $('#update-menu-order-btn').click(function(e) {
                    e.preventDefault();
                    persistUpdatedOrder();
                });
            });
        </script>
    @endpush
@endsection
