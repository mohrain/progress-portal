@extends('ward.ward-view')
@section('wardContent')

<div class="card mt-2">
    <div class="box__header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="box__title">वडा कर्मचारीहरु <i> ( वडा नं.{{ $ward->ward_id ? $ward->ward->name . '/' . $ward->name : $ward->name }})</i></div>
        </div>
    </div>

    <section class="box ">

        <div class="box__body">

       <form action="{{ isset($wardEmployee->id) ? route('ward.employees.update', [$ward, $wardEmployee]) : route('ward.employees.store', $ward) }}"
      method="POST"
      id="myForm"
      enctype="multipart/form-data">
    @csrf

    @if(isset($wardEmployee->id))
        {{-- If editing, use PUT method --}}
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-4 form-group">
            {{-- Pass selected employee if editing --}}
            <x-employee-select-component :selected="old('employee_id', $wardEmployee->employee_id ?? null)" />
        </div>

        <div class="col-md-4 form-group">
            <label for="">भूमिका</label>
            <input type="text"
                   class="form-control"
                   name="position"
                   value="{{ old('position', $wardEmployee->position ?? '') }}">
        </div>

        <div class="col-md-4">
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ isset($wardEmployee->id) ? 'अपडेट गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}
                </button>
            </div>
        </div>
    </div>
</form>


        </div>

                <div class="card-body">
                    <div class="collapse my-2" id="collapseExample">
                        <div class="card card-body">
                            <form action="{{ route('employees.search') }}" method="get">

                                <div class="row">

                                    <div class="col-md-3 mb-2">
                                        <label for="name" class="form-label ">नाम</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" value=""
                                            id="name" aria-describedby="name">
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
                                            value="" id="name_english" aria-describedby="name_english">
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
                                            value="" id="designation" aria-describedby="designation">

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
                                            class="form-control @error('branch') is-invalid @enderror" value=""
                                            id="branch" aria-describedby="branch">

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
                                            <option value="" selected>छान्नुहोस्
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
                                            value="" autocomplete="email" placeholder="example@domin.com">
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
                                            value="" autocomplete="mobile" placeholder="9xxxxxxxxx">
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
                                <th>क्र.सं</th>
                                <th>फोटो</th>
                                <th>नाम</th>
                                <th>पद</th>
                                <th>सम्पर्क</th>
                                <th></th>
                            </thead>
                            <tbody id="sortable-employee">
                                @forelse($employees as $employee)
                                <tr data-id="{{ $employee->id }}" data-order="{{ $employee->position ?? 0 }}">
                                    <td>{{$loop->iteration}}</td>
                                    <td class="sort-handle">
                                        <img id="newProfilePhotoPreview"
                                            src="{{ $employee->profile ? asset('storage/' . $employee->profile) : asset('assets/img/no-image.png') }}"
                                            class="profile-nav">
                                    </td>
                                    <td>
                                        <div class="fw-bold">
                                            {{ $employee->name }}
                                        </div>
                                        <div>
                                            {{ $employee->name_english }}
                                        </div>
                                    </td>
                                    <td>
                                        {{ $employee->wardEmployee->position ?? '' }}
                                    </td>
                                    <td>
                                        <div>
                                            {{ $employee->mobile }}
                                        </div>
                                        <div>
                                            {{ $employee->email }}
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
                                                    href="{{ route('ward.employees.edit',[$ward, $employee->wardEmployee->id]) }}">Edit</a>

                                                <form action="{{ route('ward.employees.destroy', $employee->wardEmployee) }}"
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
              
                </div>
    </section>



</div>


{{-- You might rename this to @section('wardContent') in the layout --}}
@endsection

@push('styles')
<style>
    .cursor-pointer {
        cursor: pointer;
    }
</style>
@endpush