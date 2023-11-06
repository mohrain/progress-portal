@extends('layouts.app', ['title' => __('कर्मचारीहरु')])

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
                                {{ $title = 'कर्मचारीहरु' }}
                            </div>
                            <div>
                                <a href="{{ route('employees.create') }}" class="btn btn-sm btn-primary bi bi-plus">नयाँ कर्मचारी</a>
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
                                <form action="{{ route('employees.search') }}" method="get">

                                    <div class="row">

                                        <div class="col-md-3 mb-2">
                                            <label for="name" class="form-label ">नाम</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="" id="name"
                                                aria-describedby="name">
                                            <div class="invalid-feedback">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label for="name_english" class="form-label ">English Name</label>
                                            <input type="text" name="name_english"
                                                class="form-control @error('name_english') is-invalid @enderror"
                                                value="" id="name_english"
                                                aria-describedby="name_english">
                                            <div class="invalid-feedback">
                                                @error('name_english')
                                                    {{ $message }}
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="designation"
                                                class="form-label text-md-end ">{{ __('पद') }}</label>
                                            <input type="text" name="designation"
                                                class="form-control @error('designation') is-invalid @enderror"
                                                value="" id="designation"
                                                aria-describedby="designation">

                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="branch"
                                                class="form-label text-md-end">{{ __('शाखा / महाशाखा') }}</label>
                                            <input type="text" name="branch"
                                                class="form-control @error('branch') is-invalid @enderror"
                                                value="" id="branch"
                                                aria-describedby="branch">

                                            @error('branch')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label for="gender"
                                                class="form-label text-md-end ">{{ __('लिङ्ग') }}</label>

                                            <select class="form-control @error('gender') is-invalid @enderror"
                                                name="gender" id="gender">
                                                <option value="" selected >छान्नुहोस्
                                                </option>
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
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="" autocomplete="email"
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
                                                class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                                value="" autocomplete="mobile"
                                                placeholder="9xxxxxxxxx">
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                  
                                    
                                      
                                        <div class="col-md-3 mt-md-auto mb-3 text-right">
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
                                    <th>पद</th>
                                    <th>शाखा / महाशाखा</th>
                                    <th>लिङ्ग</th>
                                    <th>जन्म मिति</th>
                                    <th>ठेगाना</th>
                                    <th>सम्पर्क</th>
                                    <th>बाबु/आमाको नाम</th>
                                    <th></th>
                                </thead>
                                <tbody id="sortable-employee">
                                    @forelse($employees as $employee)
                                        <tr data-id="{{ $employee->id }}" data-order="{{ $employee->position ?? 0 }}">
                                            <td class="sort-handle">
                                                <img id="newProfilePhotoPreview"
                                                    src="{{ $employee->profile ? asset('storage/' . $employee->profile) : asset('assets/img/no-image.png') }}"
                                                    class="profile-nav">
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $employee->name }}
                                                </div>
                                                <div>
                                                    {{ $employee->name_english }}
                                                </div>
                                            </td>
                                            <td>
                                                {{ $employee->designation }}
                                            </td>
                                            <td>
                                                {{ $employee->branch }}
                                            </td>
                                            <td>
                                                {{ $employee->gender }}
                                            </td>
                                            <td style="white-space: nowrap;">{{ $employee->dob }}</td>

                                            <td>
                                                <div style="white-space: nowrap;">
                                                    <b>स्थाई :</b> {{ $employee->permanent_address }},
                                                    {{ $employee->permanent_address_district }}
                                                </div>
                                                <div style="white-space: nowrap;">
                                                    <b>अस्थायी :</b> {{ $employee->temporary_address }},
                                                    {{ $employee->temporary_address_district }}
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $employee->mobile }}
                                                </div>
                                                <div>
                                                    {{ $employee->email }}
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $employee->father_name }}
                                                </div>
                                                <div>
                                                    {{ $employee->mother_name }}
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
                                                        {{-- <a class="dropdown-item "
                                                            href="{{ route('employees.show', $employee) }}">Show</a> --}}

                                                        <a class="dropdown-item "
                                                            href="{{ route('employees.edit', $employee) }}">Edit</a>

                                                        <form action="{{ route('employees.destroy', $employee) }}"
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
                        <button id="update-menu-order-btn" type="button" class="btn btn-primary mx-0 mt-3">
                            क्रमबद्ध मिलाउनुहोस्
                        </button>
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(function() {
                // Sorting
                $('#sortable-employee').sortable({
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
                    var employees = [];
                    $('.order-updated').each(function() {
                        employees.push({
                            id: $(this).attr('data-id'),
                            position: $(this).attr('data-order')
                        });
                    });
                    console.table(employees);
                    axios({
                        method: 'put',
                        url: "{{ route('employees.sort') }}",
                        data: {
                            employees: employees,
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
